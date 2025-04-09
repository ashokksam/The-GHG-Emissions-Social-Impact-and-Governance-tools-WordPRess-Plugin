<?php
function get_countries_regions_select_box() {
  global $wpdb;
  $table_name = $wpdb->prefix . 'location'; // Ensure the table name is correct

  // Fetch all countries (where region is NULL or empty)
  $countries = $wpdb->get_results("SELECT id, country FROM $table_name WHERE region IS NULL OR region = '' ORDER BY country ASC");

  if (empty($countries)) {
      return '<p>No countries found.</p>';
  }

  // Start the HTML output
  $output = '<select id="country-select" name="country">';
  $output .= '<option value="">Select Country</option>';
  foreach ($countries as $country) {
      $output .= '<option value="' . esc_attr($country->id) . '">' . esc_html($country->country) . '</option>';
  }
  $output .= '</select>';

  $output .= '<select id="region-select" name="region" style="display: none;">';
  $output .= '<option value="">Select Region</option>';
  $output .= '</select>';

  // Add JavaScript for dynamic region loading
  $output .= '
  <script>
  jQuery(document).ready(function($) {
      $("#country-select").change(function() {
          var countryId = $(this).val();
          if (countryId) {
              $.ajax({
                  url: "' . admin_url('admin-ajax.php') . '",
                  type: "POST",
                  data: {
                      action: "get_regions_by_country",
                      country_id: countryId
                  },
                  success: function(response) {
                  
                              $.ajax({
                                        url: "' . admin_url('admin-ajax.php') . '",
                                        type: "POST",
                                        data: {
                                            action: "get_regions_by_country_public_Transport",
                                            country_id: countryId
                                        },
                                        success: function(response) {
                                            if (response) {
                                                $(".public_tranpost_data_s").html(response).show();
                                            } else {
                                                $(".public_tranpost_data_s").html("<option value=\'\'>No regions</option>").hide();
                                            }
                                        },
                                        error: function(jqXHR, textStatus, errorThrown) {
                                            console.log("AJAX error:", textStatus, errorThrown);
                                        }
                            });


                            
                      if (response) {
                          $("#region-select").html(response).show();





                      } else {
                          $("#region-select").html("<option value=\'\'>No regions</option>").hide();
                      }
                  },
                  error: function(jqXHR, textStatus, errorThrown) {
                      console.log("AJAX error:", textStatus, errorThrown);
                  }
              });
          } else {
              $("#region-select").html("<option value=\'\'>Select Region</option>").hide();
          }
      });
  });
  </script>';

  return $output;
}
add_shortcode('country_region_select', 'get_countries_regions_select_box');



function get_reporting_period_dropdown() {
  global $wpdb;
  $table_name = $wpdb->prefix . 'emission'; // Replace with your table name

  // Fetch unique years from the second table
  $years = $wpdb->get_col("SELECT DISTINCT year FROM $table_name ORDER BY year DESC");

  if (empty($years)) {
      return '<p>No reporting periods found.</p>';
  }

  // Start the HTML output
  $output = '<select id="reporting-period" name="reporting_period">';
  $output .= '<option value="">Select Reporting Period</option>';
  foreach ($years as $year) { if($year == '') {continue;}
      $output .= '<option value="' . esc_attr($year) . '">' . esc_html($year) . '</option>';
  }
  $output .= '</select>';

  $output.= '
  <script>
  jQuery(document).ready(function($) {
  $("#reporting-period").change(function() {
  var countryId = $("#country-select").val(); // Get selected country ID
    var regionId = $("#region-select").val(); // Get selected region ID
    var locationId = regionId || countryId; // Use region ID if available, otherwise use country ID
    var year = $(this).val();

        if (locationId && year) {
            $.ajax({
                url: "' . admin_url('admin-ajax.php') . '",
                type: "POST",
                data: {
                    action: "get_data_by_location_and_year",
                    location_id: locationId,
                    year: year
                },
                success: function(response) {
                    $("#data-results").html(response); // Display the results in a div
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    console.log("AJAX error:", textStatus, errorThrown);
                }
            });
        } else {
            $("#data-results").html("<p>Please select a location and reporting period.</p>");
        }
    });
    });
  </script>
  ';

  return $output;
}
add_shortcode('reporting_period_dropdown', 'get_reporting_period_dropdown');


///


function get_transportSectionFreight_dropdown() {
  global $wpdb;
  $table_name = 'freight'; // Replace with your table name

  // Fetch unique years from the second table
  $years = $wpdb->get_col("SELECT DISTINCT Freight FROM $table_name ORDER BY Freight ASC");

  if (empty($years)) {
      return '<p>No Freight Transport found.</p>';
  }

  // Start the HTML output
  $output = '<select id="FreightTransport" name="FreightTransport">';
  $output .= '<option value="">Select Reporting Period</option>';
  foreach ($years as $year) { if($year == '') {continue;}
      $output .= '<option value="' . esc_attr($year) . '">' . esc_html($year) . '</option>';
  }
  $output .= '</select>';

  return $output;
}
add_shortcode('transportSectionFreight', 'get_transportSectionFreight_dropdown');




function get_public_transport_dropdown() {
  global $wpdb;
  $table_name = 'public_transport'; // Replace with your table name

  // Fetch unique years from the second table
  $years = $wpdb->get_col("SELECT DISTINCT Public_Transport FROM $table_name ORDER BY Public_Transport ASC");

  if (empty($years)) {
      return '<p>No Freight Transport found.</p>';
  }

  // Start the HTML output
  $output = '<select id="public_transportS" name="public_transport">';
  $output .= '<option value="">Select Reporting Period</option>';
  foreach ($years as $year) { if($year == '') {continue;}
      $output .= '<option value="' . esc_attr($year) . '">' . esc_html($year) . '</option>';
  }
  $output .= '</select>';

  return $output;
}
add_shortcode('public_transport', 'get_public_transport_dropdown');



