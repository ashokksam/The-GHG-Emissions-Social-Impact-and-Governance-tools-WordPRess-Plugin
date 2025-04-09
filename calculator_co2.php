<?php
/*
Plugin Name: Co2 Calculator
Plugin URI: https://avikasoft.com/
Description: Co2 Calculator
Version: 0.1
Requires at least: 5.8
Requires PHP: 5.6.20
Author: AvikaSoft
Author URI: https://avikasoft.com
License: GPLv2 or later
Text Domain: co2-calculator
*/


if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Calculator_CO2_AK {

    // Plugin version
    const VERSION = '0.1';

    // Constructor to initialize the plugin
    public function __construct() {
        $this->define_constants();
        $this->add_hooks();
    }

    // Define plugin constants
    private function define_constants() {
        define( 'Calculator_CO2_AK_PATH', plugin_dir_path( __FILE__ ) );
        define( 'Calculator_CO2_AK_URL', plugin_dir_url( __FILE__ ) );
        define( 'Calculator_CO2_AK_VERSION', self::VERSION );
    }

    // Register hooks and actions
    private function add_hooks() {
       
        add_action( 'wp_enqueue_scripts', [ $this, 'enqueue_admin_scripts' ] );
		add_shortcode( 'FormCalculatorCO2', [ $this, 'FormCalculatorCO2Function' ] );

        add_action('wp_ajax_get_regions_by_country',  [ $this,'get_regions_by_country' ]);
        add_action('wp_ajax_nopriv_get_regions_by_country', [ $this,'get_regions_by_country' ]);

        add_action('wp_ajax_get_data_by_location_and_year', [ $this,'get_data_by_location_and_year']);
        add_action('wp_ajax_nopriv_get_data_by_location_and_year', [ $this,'get_data_by_location_and_year']);


        add_action('wp_ajax_calculate_emissions', [ $this,'calculate_emissions']);
        add_action('wp_ajax_nopriv_calculate_emissions', [ $this,'calculate_emissions']);

        add_action('wp_ajax_display_freight_data', [ $this,'display_freight_data']);
        add_action('wp_ajax_nopriv_display_freight_data', [ $this,'display_freight_data']);
        
        add_action('wp_ajax_display_public_transport_data', [ $this,'display_public_transport_data']);
        add_action('wp_ajax_nopriv_display_public_transport_data', [ $this,'display_public_transport_data']);

        add_action('wp_ajax_display_Transportation_data', [ $this,'display_Transportation_data']);
        add_action('wp_ajax_nopriv_display_Transportation_data', [ $this,'display_Transportation_data']);


        add_action('wp_ajax_get_regions_by_country_public_Transport',  [ $this,'get_Transportation_dropdown' ]);
        add_action('wp_ajax_nopriv_get_regions_by_country_public_Transport',[ $this, 'get_Transportation_dropdown'] );

        add_action('wp_ajax_send_report_email', [ $this,'send_report_email_cb']);
        add_action('wp_ajax_nopriv_send_report_email', [ $this,'send_report_email_cb']);
        
        add_action('wp_footer', [__CLASS__, 'avikasoft_calculator_custom_scripts_cb']);
        add_action('wp_footer', [__CLASS__, 'avikasoft_calculator_custom_scripts_cbSocial_Impact']);
        add_action('wp_footer', [__CLASS__, 'avikasoft_calculator_custom_scripts_cbGovernancerestult']);

    }
    public static function send_report_email_cb() {
        $return = [];
    
        if (isset($_FILES['pdf'])) {
            $email      = (isset($_POST['email'])) ? sanitize_email($_POST['email']) : '';
            if(empty($email) || !is_email($email)){
                $return['status']   =   false;
                $return['msg']      =   'Invalid Email Address!';
                echo json_encode($return);
                exit;
            }
            $upload_dir = wp_upload_dir();
            $pdf_folder = $upload_dir['path'] . '/calculator-pdf-files';
            $pdf_filename = sanitize_file_name($_POST['filename']);

            $pdf_path   = $pdf_folder . '/'.$pdf_filename;
    
            // Ensure the directory exists
            if (!file_exists($pdf_folder)) {
                mkdir($pdf_folder, 0755, true); // Create directory if not exists
            }
    
            // Move uploaded file
            if (move_uploaded_file($_FILES['pdf']['tmp_name'], $pdf_path)) {
                // Check if file actually exists
                if (!file_exists($pdf_path)) {
                    $return['status'] = false;
                    $return['msg'] = 'PDF file move failed!';
                    echo json_encode($return);
                    exit;
                }
    
                // Send Email
                $to             =   $email; // Change recipient
                $subject        =   'Generated Report';
                $message        =   'Please find the attached report.';
                $headers        =   array('Content-Type: text/html; charset=UTF-8');
                $attachments    =   array($pdf_path);
                $sent           =   wp_mail($to, $subject, $message, $headers, $attachments);
                if ($sent) {
                    $return['status'] = true;
                    $return['msg'] = 'Success! Email sent.';
                } else {
                    $return['status'] = false;
                    $return['msg'] = 'Email not sent!';
                }
            } else {
                $return['status'] = false;
                $return['msg'] = 'File upload failed!';
            }
        } else {
            $return['status'] = false;
            $return['msg'] = 'No PDF file received!';
        }
    
        echo json_encode($return);
        exit;
    }
    
    public static function avikasoft_calculator_custom_scripts_cb(){
        ?>
        <script>
      document.addEventListener("DOMContentLoaded", function () {
    document.getElementById("submit-GHGEmissions").addEventListener("click", function () {
        generatePDF(true); // Generate and send PDF via email
    });

    document.getElementById("DownloadPDFForGHGEMISSIOM").addEventListener("click", function () {
        generatePDF(false); // Generate and download PDF
    });

    function generatePDF(sendEmail) {
        let reportSection = document.querySelector(".report-graph-main-section");
        let emailInput = document.getElementById("sendemail-GHGEmissions") ? document.getElementById("sendemail-GHGEmissions").value.trim() : "";

        setTimeout(() => {
            html2canvas(reportSection, {
                scale: 2,  // Higher scale for better quality
                useCORS: true, 
                allowTaint: true,
                backgroundColor: "#ffffff"
            }).then(canvas => {
                let imgData = canvas.toDataURL("image/png");

                // A4 size in mm (no margins)
                let pdf = new jspdf.jsPDF("p", "mm", "a4");
                let pageWidth = 210;
                let pageHeight = 297;
                
                let imgWidth = pageWidth;
                let imgHeight = (canvas.height * imgWidth) / canvas.width;

                if (imgHeight > pageHeight) {
                    let totalPages = Math.ceil(imgHeight / pageHeight);
                    for (let i = 0; i < totalPages; i++) {
                        let sourceY = i * pageHeight * (canvas.width / imgWidth);
                        let pageCanvas = document.createElement("canvas");
                        let pageContext = pageCanvas.getContext("2d");

                        pageCanvas.width = canvas.width;
                        pageCanvas.height = pageHeight * (canvas.width / imgWidth);
                        pageContext.drawImage(canvas, 0, sourceY, canvas.width, pageCanvas.height, 0, 0, canvas.width, pageCanvas.height);

                        let pageImageData = pageCanvas.toDataURL("image/png");
                        if (i > 0) pdf.addPage();
                        pdf.addImage(pageImageData, "PNG", 0, 0, imgWidth, pageHeight);
                    }
                } else {
                    pdf.addImage(imgData, "PNG", 0, 0, imgWidth, imgHeight);
                }

                // Generate unique filename
                let timestamp = new Date().toISOString().replace(/[-:.]/g, "").slice(0, 15);
                let pdfFilename = `ESG_Report_${timestamp}.pdf`;

                if (sendEmail) {
                    let pdfBlob = pdf.output("blob");

                    let formData = new FormData();
                    formData.append("pdf", pdfBlob, pdfFilename);
                    formData.append("filename", pdfFilename);
                    formData.append("email", emailInput);
                    formData.append('action', 'send_report_email');

                    fetch("<?php echo admin_url("admin-ajax.php"); ?>", { // Replace with actual AJAX URL
                        method: "POST",
                        body: formData
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.status) {
                            alert("Success! Email Sent.");
                        } else {
                            alert("Error: " + data.msg);
                        }
                    })
                    .catch(error => {
                        alert("Failed to send email: " + error);
                    });
                } else {
                    pdf.save(pdfFilename);
                }
            });
        }, 1000);
    }
});


        </script>
        <?php
    }


    public static function avikasoft_calculator_custom_scripts_cbSocial_Impact(){
        ?>
        <script>
          document.addEventListener("DOMContentLoaded", function () {
    document.getElementById("generateReport").addEventListener("click", function () {
        generatePDF(true); // Send via email
    });

    document.getElementById("DownloadPDFforSocialImpact").addEventListener("click", function () {
        generatePDF(false); // Download directly
    });

    function generatePDF(sendEmail) {
        let reportSection = document.querySelector("#calculationResults");
        let emailInput = document.getElementById("calculator-email-social") 
                         ? document.getElementById("calculator-email-social").value.trim() 
                         : "";

        setTimeout(() => {
            html2canvas(reportSection, {
                scale: 2,  // Higher scale for better quality
                useCORS: true, 
                allowTaint: true,
                backgroundColor: "#ffffff"
            }).then(canvas => {
                let imgData = canvas.toDataURL("image/png");

                let pdf = new jspdf.jsPDF("p", "mm", "a4");
                let pageWidth = 210;
                let pageHeight = 297;

                let imgWidth = pageWidth;
                let imgHeight = (canvas.height * imgWidth) / canvas.width;

                if (imgHeight > pageHeight) {
                    let totalPages = Math.ceil(imgHeight / pageHeight);
                    for (let i = 0; i < totalPages; i++) {
                        let sourceY = i * pageHeight * (canvas.width / imgWidth);
                        let pageCanvas = document.createElement("canvas");
                        let pageContext = pageCanvas.getContext("2d");

                        pageCanvas.width = canvas.width;
                        pageCanvas.height = pageHeight * (canvas.width / imgWidth);
                        pageContext.drawImage(canvas, 0, sourceY, canvas.width, pageCanvas.height, 0, 0, canvas.width, pageCanvas.height);

                        let pageImageData = pageCanvas.toDataURL("image/png");
                        if (i > 0) pdf.addPage();
                        pdf.addImage(pageImageData, "PNG", 0, 0, imgWidth, pageHeight);
                    }
                } else {
                    pdf.addImage(imgData, "PNG", 0, 0, imgWidth, imgHeight);
                }

                let timestamp = new Date().toISOString().replace(/[-:.]/g, "").slice(0, 15);
                let pdfFilename = `Social_Impact_Report_${timestamp}.pdf`;

                if (sendEmail) {
                    let pdfBlob = pdf.output("blob");

                    let formData = new FormData();
                    formData.append("pdf", pdfBlob, pdfFilename);
                    formData.append("filename", pdfFilename);
                    formData.append("email", emailInput);
                    formData.append('action', 'send_report_email');

                    fetch("<?php echo admin_url("admin-ajax.php"); ?>", { // Replace with actual AJAX URL
                        method: "POST",
                        body: formData
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.status) {
                            alert("Success! Email Sent.");
                        } else {
                            alert("Error: " + data.msg);
                        }
                    })
                    .catch(error => {
                        alert("Failed to send email: " + error);
                    });
                } else {
                    pdf.save(pdfFilename);
                }
            });
        }, 1000);
    }
});

        </script>
        <?php
    }
    
    public static function avikasoft_calculator_custom_scripts_cbGovernancerestult(){
        ?>
        <script>
          document.addEventListener("DOMContentLoaded", function () {
    document.getElementById("clickGovernance").addEventListener("click", function () {
        generatePDF(true); // Send via email
    });

    document.getElementById("GovernancerestultDownloadPDF").addEventListener("click", function () {
        generatePDF(false); // Download directly
    });

    function generatePDF(sendEmail) {
        let reportSection = document.querySelector(".Governancerestult");
        let emailInput = document.getElementById("calculator-email-Governance") 
                         ? document.getElementById("calculator-email-Governance").value.trim() 
                         : "";

        setTimeout(() => {
            html2canvas(reportSection, {
                scale: 2,  // High resolution
                useCORS: true, 
                allowTaint: true,
                backgroundColor: "#ffffff"
            }).then(canvas => {
                let imgData = canvas.toDataURL("image/png");

                let pdf = new jspdf.jsPDF("p", "mm", "a4");
                let pageWidth = 210;
                let pageHeight = 297;

                let imgWidth = pageWidth;
                let imgHeight = (canvas.height * imgWidth) / canvas.width;

                if (imgHeight > pageHeight) {
                    let totalPages = Math.ceil(imgHeight / pageHeight);
                    for (let i = 0; i < totalPages; i++) {
                        let sourceY = i * pageHeight * (canvas.width / imgWidth);
                        let pageCanvas = document.createElement("canvas");
                        let pageContext = pageCanvas.getContext("2d");

                        pageCanvas.width = canvas.width;
                        pageCanvas.height = pageHeight * (canvas.width / imgWidth);
                        pageContext.drawImage(canvas, 0, sourceY, canvas.width, pageCanvas.height, 0, 0, canvas.width, pageCanvas.height);

                        let pageImageData = pageCanvas.toDataURL("image/png");
                        if (i > 0) pdf.addPage();
                        pdf.addImage(pageImageData, "PNG", 0, 0, imgWidth, pageHeight);
                    }
                } else {
                    pdf.addImage(imgData, "PNG", 0, 0, imgWidth, imgHeight);
                }

                let timestamp = new Date().toISOString().replace(/[-:.]/g, "").slice(0, 15);
                let pdfFilename = `Governance_Report_${timestamp}.pdf`;

                if (sendEmail) {
                    let pdfBlob = pdf.output("blob");

                    let formData = new FormData();
                    formData.append("pdf", pdfBlob, pdfFilename);
                    formData.append("filename", pdfFilename);
                    formData.append("email", emailInput);
                    formData.append('action', 'send_report_email');

                    fetch("<?php echo admin_url("admin-ajax.php"); ?>", { // Replace with actual AJAX URL
                        method: "POST",
                        body: formData
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.status) {
                            alert("Success! Email Sent.");
                        } else {
                            alert("Error: " + data.msg);
                        }
                    })
                    .catch(error => {
                        alert("Failed to send email: " + error);
                    });
                } else {
                    pdf.save(pdfFilename);
                }
            });
        }, 1000);
    }
});

        </script>
        <?php
    }
	public function FormCalculatorCO2Function( $atts = [], $content = null ) {
		ob_start();
            require_once plugin_dir_path( __FILE__ ) . 'includes/shortcodes.php';
			require_once plugin_dir_path( __FILE__ ) . 'includes/FormHtml.php';
		return ob_get_clean();
	}

    // Enqueue admin scripts
    public function enqueue_admin_scripts() {

		wp_enqueue_script('jquery-cdn', 'http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js', [],  null, true);

        wp_enqueue_script('jspdf-umd-min-js', 'https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js', [],  null, true);
        wp_enqueue_script('html2canvas-min-js', 'https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js', [],  null, true);

        wp_enqueue_script( 'my-plugin-script', Calculator_CO2_AK_URL . 'assets/js/FormJS.js', [ 'jquery' ], self::VERSION, true );

		wp_enqueue_style('my-plugin-admin-style', Calculator_CO2_AK_URL . 'assets/css/FormCSS.css',[],self::VERSION);

		
    }


    
// AJAX handler to fetch regions
    public function get_regions_by_country() {
        global $wpdb;
        $table_name = $wpdb->prefix . 'location';
    
        if (isset($_POST['country_id'])) {
            $country_id = intval($_POST['country_id']);
            $regions = $wpdb->get_results($wpdb->prepare("SELECT id, region FROM $table_name WHERE country = (SELECT country FROM $table_name WHERE id = %d) AND region IS NOT NULL AND region != '' ORDER BY region ASC", $country_id));
    
            if (!empty($regions)) {
                $options = '<option value="">Select Region</option>';
                foreach ($regions as $region) {
                    $options .= '<option value="' . esc_attr($region->id) . '">' . esc_html($region->region) . '</option>';
                }
                echo $options;
            } else {
                echo ''; // No regions found, return empty response
            }
        }
// echo do_shortcode('[public_transportation]');
//         get_Transportation_dropdown($_POST['country_id']);

        wp_die();
    }
    

    //

    public function get_data_by_location_and_year() {
        global $wpdb;
        $table_name = $wpdb->prefix . 'emission'; // Replace with your table name
    
        if (isset($_POST['location_id']) && isset($_POST['year'])) {
            $location_id = intval($_POST['location_id']);
            $year = intval($_POST['year']);
    
            // Fetch data based on location_id and year
            $data = $wpdb->get_results($wpdb->prepare(
                "SELECT * FROM $table_name WHERE location_id = %d AND year = %d",
                $location_id,
                $year
            ));
    
            if (!empty($data)) {
                $output = '<table border="1">';
                $output .= '<tr><th>Type</th><th>Value</th></tr>';
                foreach ($data as $row) {
                    $output .= '<tr>';
                    $output .= '<td>' . esc_html($row->type) . '</td>';
                    // $output .= '<td>' . esc_html($row->unit) . '</td>';
                    $output .= '<td>' . esc_html($row->value) . '</td>';
                    // $output .= '<td>' . esc_html($row->fuel_type) . '</td>';
                    $output .= '</tr>';
                }
                $output .= '</table><br><button id="reset-button">Reset</button>';
                echo $output;
            } else {
                echo '<p>No data found for the selected location and year.</p>';
            }
        } else {
            echo '<p>Invalid request.</p>';
        }
        wp_die();
    }


    //

    public function calculate_emissions() {
        global $wpdb;
        $emission_table = $wpdb->prefix . 'emission';
        $fuel_source_table ='fuel_source';
    
        if (isset($_POST['country_id']) && isset($_POST['fuel_type_id']) && isset($_POST['distance_traveled'])) {
            $country_id = intval($_POST['country_id']);
             $fuel_type_id = $_POST['fuel_type_id'];
            $distance_traveled = floatval($_POST['distance_traveled']);
            $distanceUnit = $_POST['distanceUnit'];
    

            $fuel_type_id_get = $wpdb->get_row($wpdb->prepare(
                "SELECT id FROM `fuel_source` WHERE  REPLACE(fuel, ' - ', '-') = '$fuel_type_id'" ));
                // echo "SELECT id FROM `fuel_source` WHERE  REPLACE(fuel, ' - ', '-') = '$fuel_type_id'";
                // print_r($fuel_type_id_get);
                // echo $fuel_type_id_get->id;

            //  echo "SELECT e.type, e.unit, e.value, f.fuel 
            //      FROM $emission_table e 
            //      INNER JOIN $fuel_source_table f ON e.fuel_type = f.id 
            //      WHERE e.location_id =  $country_id AND e.fuel_type = $fuel_type_id_get->id"; 


            // Fetch emissions data for the selected country and fuel type
            $emissions = $wpdb->get_results($wpdb->prepare(
                "SELECT e.type, e.unit, e.value, f.fuel 
                 FROM $emission_table e 
                 INNER JOIN $fuel_source_table f ON e.fuel_type = f.id 
                 WHERE e.location_id = %d AND e.fuel_type = %d",
                $country_id,
                $fuel_type_id_get->id
            ));
    
            if (!empty($emissions)) {
                $output = '<table>';
                $output .= '<tr><th>Type</th><th>Unit</th><th>Value</th><th>Fuel Type</th></tr>';
                foreach ($emissions as $emission) {
                    $calculatedValue = $emission->value * $distance_traveled. ' / Miles'; // Multiply by distance
                    if($distanceUnit != 'miles'){
                        $calculatedValue = $calculatedValue*1.60934. ' / KM';
                    }
                    $output .= '<tr>';
                    $output .= '<td>' . esc_html($emission->type) . '</td>';
                    $output .= '<td>' . esc_html($emission->unit) . '</td>';
                    $output .= '<td>' . esc_html($calculatedValue) . '</td>';
                    $output .= '<td>' . esc_html($emission->fuel) . '</td>';
                    $output .= '</tr>';
                }
                $output .= '</table>';
                echo $output;
            } else {
                echo '<p>No emissions data found for the selected country and fuel type.</p>';
            }
        } else {
            echo '<p>Invalid request.</p>';
        }
        wp_die();
    }
    
   


    public function get_freight_data_by_location($location_id, $fuel_type_id ) {
        global $wpdb;
        $table_name = 'freight'; // Replace with your table name
        $location_table = $wpdb->prefix . 'location'; // Replace with your location table name
    
        // Check if the location exists in the location table
        $location_exists = $wpdb->get_var($wpdb->prepare(
            "SELECT COUNT(*) FROM $location_table WHERE id = %d",
            $location_id
        ));
    
        // If location does not exist, use location = 0
        if (!$location_exists) {
            $location_id = 0;
        }
   /*  echo "SELECT Freight, CH4, N2O, CO2 
             FROM $table_name 
             WHERE Freight = '$fuel_type_id' AND location = $location_id"; */
        // Fetch data from table_name based on the location
        $data = $wpdb->get_results($wpdb->prepare(
            "SELECT Freight, CH4, N2O, CO2 
             FROM $table_name 
             WHERE Freight = '%s' AND location = %d" ,
             $fuel_type_id,
             $location_id
        ));
    
        return $data;
    }
    
    public function display_freight_data() {
        if (isset($_POST['country_id'])) {
            $location_id = intval($_POST['country_id']);
            $fuel_type_id = $_POST['fuel_type_id'];
            $distance_traveled = $_POST['distance_traveled'];
            $data = $this->get_freight_data_by_location($location_id, $fuel_type_id );
    
            if (!empty($data)) {
                $output = '<table border="1">';
                $output .= '<tr><th>Freight</th><th>CH4</th><th>N2O</th><th>CO2</th></tr>';
                foreach ($data as $row) {
                    $output .= '<tr>';
                    $output .= '<td>' . esc_html($row->Freight) . '</td>';
                    $output .= '<td>' . esc_html($row->CH4*$distance_traveled) . '</td>';
                    $output .= '<td>' . esc_html($row->N2O*$distance_traveled) . '</td>';
                    $output .= '<td>' . esc_html($row->CO2*$distance_traveled) . '</td>';
                    $output .= '</tr>';
                }
                $output .= '</table>';
                echo $output;
            } else {
                echo '<p>No data found for the selected location.</p>';
            }
        } else {
            echo '<p>Invalid request.</p>';
        }
        wp_die();
    }




    public function get_public_transportt_data_by_location($location_id, $fuel_type_id ) {
        global $wpdb;
        $table_name = 'public_transport'; // Replace with your table name
        $location_table = $wpdb->prefix . 'location'; // Replace with your location table name
    
        // Check if the location exists in the location table
        $location_exists = $wpdb->get_var($wpdb->prepare(
            "SELECT COUNT(*) FROM $location_table WHERE id = %d",
            $location_id
        ));
    
        // If location does not exist, use location = 0
        if (!$location_exists) {
            $location_id = 0;
        }
    // echo "SELECT public_transport, CH4, N2O, CO2 
    //          FROM $table_name 
    //          WHERE public_transport = '$fuel_type_id' AND region = $location_id"; 
        // Fetch data from table_name based on the location
        $data = $wpdb->get_results($wpdb->prepare(
            "SELECT public_transport, CH4, N2O, CO2 
             FROM $table_name 
             WHERE public_transport = '%s' AND region = %d" ,
             $fuel_type_id,
             $location_id
        ));
    
        return $data;
    }
    
    public function display_public_transport_data() {
        ini_set('display_errors', 1); ini_set('display_startup_errors', 1); error_reporting(E_ALL);
        if (isset($_POST['country_id'])) {
            $location_id = intval($_POST['country_id']);
            $fuel_type_id = $_POST['fuel_type_id'];
            $distance_traveled = $_POST['distance_traveled'];
            $data = $this->get_public_transportt_data_by_location($location_id, $fuel_type_id );
    
            if (!empty($data)) {
                $output = '<table border="1">';
                $output .= '<tr><th>Public Transport</th><th>CH4</th><th>N2O</th><th>CO2</th></tr>';
                foreach ($data as $row) {
                    $output .= '<tr>';
                    $output .= '<td>' . esc_html($row->public_transport) . '</td>';
                    $output .= '<td>' . esc_html($row->CH4*$distance_traveled) . '</td>';
                    $output .= '<td>' . esc_html($row->N2O*$distance_traveled) . '</td>';
                    $output .= '<td>' . esc_html($row->CO2*$distance_traveled) . '</td>';
                    $output .= '</tr>';
                }
                $output .= '</table>';
                echo $output;
            } else {
                echo '<p>No data found for the selected location.</p>';
            }
        } else {
            echo '<p>Invalid request.</p>';
        }
        wp_die();
    }
   


    //

    
    public function get_Transportation_data_by_location($location_id, $fuel_type_id ) {
        global $wpdb;
        $table_name = 'vehicle_pub'; // Replace with your table name
        $location_table = $wpdb->prefix . 'location'; // Replace with your location table name
    
        // Check if the location exists in the location table
        $location_exists = $wpdb->get_var($wpdb->prepare(
            "SELECT COUNT(*) FROM $location_table WHERE id = %d",
            $location_id
        ));
    
        // If location does not exist, use location = 0
        if (!$location_exists) {
            $location_id = 0;
        }
    // echo "SELECT vehicle_pub, CH4, N2O, CO2 
    //          FROM $table_name 
    //          WHERE vehicle_pub = '$fuel_type_id' AND region = $location_id"; 
        // Fetch data from table_name based on the location
        $data = $wpdb->get_results($wpdb->prepare(
            "SELECT vehicle_pub_data, CH4, N2O, CO2 
             FROM $table_name 
             WHERE vehicle_pub_data = '%s' AND region = %d" ,
             $fuel_type_id,
             $location_id
        ));
    
        return $data;
    }
    
    public function display_Transportation_data() {
        ini_set('display_errors', 1); ini_set('display_startup_errors', 1); error_reporting(E_ALL);
        if (isset($_POST['country_id'])) {
            $location_id = intval($_POST['country_id']);
            $fuel_type_id = $_POST['fuel_type_id'];
            $distance_traveled = $_POST['distance_traveled'];
            $data = $this->get_Transportation_data_by_location($location_id, $fuel_type_id );
    
            if (!empty($data)) {
                $output = '<table border="1">';
                $output .= '<tr><th>Public Transport</th><th>CH4</th><th>N2O</th><th>CO2</th></tr>';
                foreach ($data as $row) {
                    $output .= '<tr>';
                    $output .= '<td>' . esc_html($row->vehicle_pub_data) . '</td>';
                    $output .= '<td>' . esc_html($row->CH4*$distance_traveled) . '</td>';
                    $output .= '<td>' . esc_html($row->N2O*$distance_traveled) . '</td>';
                    $output .= '<td>' . esc_html($row->CO2*$distance_traveled) . '</td>';
                    $output .= '</tr>';
                }
                $output .= '</table>';
                echo $output;
            } else {
                echo '<p>No data found for the selected location.</p>';
            }
        } else {
            echo '<p>Invalid request.</p>';
        }
        wp_die();
    }


   public  function get_Transportation_dropdown() {
       
            global $wpdb;
            $table_name = 'vehicle_pub'; // Replace with your table name
            $location_id = $_POST['country_id'];
            if($location_id == 1 || $location_id == 68){
               
            }else{ 
                $location_id = 0;
            }
            
            //echo "SELECT DISTINCT vehicle_pub_data FROM $table_name  where Region = $location_id ORDER BY vehicle_pub_data ASC";
            // Fetch unique years from the second table start -
            $years = $wpdb->get_col("SELECT DISTINCT vehicle_pub_data FROM $table_name  where Region = $location_id ORDER BY vehicle_pub_data ASC");
        
            if (empty($years)) {
                return '<p>No Freight Transport found.</p>';
            }
        
            // Start the HTML output
            $output = '<select id="vehicle_pub_dataS" class="vehicle_pub_dataS" name="vehicle_pub_data">';
            $output .= '<option value="">Select Reporting Period</option>';
            foreach ($years as $year) { if($year == '') {continue;}
                $output .= '<option value="' . esc_attr($year) . '">' . esc_html($year) . '</option>';
            }
            $output .= '</select>';
        
            echo $output;

            exit();
      }



}

// Initialize the plugin
new Calculator_CO2_AK();
