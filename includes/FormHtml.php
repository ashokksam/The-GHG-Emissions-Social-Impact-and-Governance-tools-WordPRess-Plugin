<style>
input#submit-action-report-generation {
    padding: 10px 15px;
    background-color: #007bff;
    color: white;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    margin-top: 15px;
    transition: background-color 0.3s;
}
  h4 {
    margin-top: 20px;
     font-family: verdana;
     font-size: 28px;
  }
 h3, h5, h2 {
   font-size: 28px;
     font-family: verdana !important;
  }
  label {
    margin-bottom: 25px;
    margin-top: 0 !important;
  }
  #bar-chart-container, #doughnut-chart-container {
      width: 100%; /* Adjust as needed */
      height: 400px; /* Increase height */
  }
  #emissionsBarChart, #emissionsDoughnutChart {
      width: 100% !important;
      height: 100% !important;
  }
  .report-graph-main-section {
      width: 100%;
      padding: 30px 100px;
      display: grid;
      gap: 15px;
      background-image: url("/wp-content/plugins/calculator_co2/assets/img/graph-back.jpg");
  }
  h1.has-text-align-center.wp-block-post-title {
    font-size: 41px;
    font-family: verdana;
    font-weight: 900;
}

</style>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
  <style>
    .info-icon {
      margin-left: 5px;
      cursor: pointer;
      color: #007bff;
      position: relative;
    }

    .info-icon:hover::after {
    content: attr(data-tooltip);
    position: absolute;
    left: 50%;
    bottom: 120%;
    transform: translateX(-50%);
    background: rgba(0, 0, 0, 0.8);
    color: #fff;
    padding: 5px 10px;
    font-size: 12px;
    /* white-space: nowrap; */
    border-radius: 5px;
    visibility: visible;
    opacity: 1;
    transition: opacity 0.2s;
    width: 300px;
    line-height: 1.2;
    font-size: 13px;
    font-family: verdana;
    font-weight: 200;
}

    .info-icon::after {
      content: attr(data-tooltip);
      position: absolute;
      left: 50%;
      bottom: 120%;
      transform: translateX(-50%);
      background: rgba(0, 0, 0, 0.8);
      color: #fff;
      padding: 5px 10px;
      font-size: 12px;
      /*white-space: nowrap;*/
      border-radius: 5px;
      visibility: hidden;
      opacity: 0;
      transition: opacity 0.2s;
    }
  </style>
<div class="tabs">
  <div class="tab active" data-step="1">GHG Emissions</div>

  <div class="tab" data-step="3">Social Impact</div>
  <div class="tab " data-step="2">Governance</div>
</div>


<!-- Step 2 -->
<div class="step " data-step="2">
  <!-- <h4>Step 2</h4> -->
  <div class="subtabs">
    <div class="subtab active" data-substep="2-1">Board Conduct</div>
    <div class="subtab" data-substep="2-2">Business Conduct</div>
    <div class="subtab" data-substep="2-3">Corporate Culture</div>
  </div>

  <!-- Substep 2-1 -->
  <div class="substep active" data-substep="2-1">
    <form method="post" id="EmissionsForm">
      <div class="section">
        <h4>Board of Directors</h4>
        <div class="tab-3-box">
          <div class="input-box">
            <label for="boardMeetings">How many Board Meetings are convened each year? <i class="fa fa-info-circle info-icon" data-tooltip=" Dummy text"></i></label>
            <input type="number" id="boardMeetings" name="boardMeetings" required>
          </div>

          <div class="input-box">
            <label for="executiveDirectors">How many executive directors? <i class="fa fa-info-circle info-icon" data-tooltip=" Dummy text"></i></label>
            <input type="number" id="executiveDirectors" name="executiveDirectors" required>
          </div>

          <div class="input-box">
            <label for="nonExecutiveDirectors">How many non-executive directors? <i class="fa fa-info-circle info-icon" data-tooltip=" Dummy text"></i></label>
            <input type="number" id="nonExecutiveDirectors" name="nonExecutiveDirectors" required>
          </div>

          <div class="input-box">
            <label for="nominatedDirectorsESG">How many nominated directors are responsible for ESG reporting? <i class="fa fa-info-circle info-icon" data-tooltip=" Dummy text"></i></label>
            <input type="number" id="nominatedDirectorsESG" name="nominatedDirectorsESG" required>
          </div>

          <div class="input-box">
            <label for="avgAbsence">On average, how many directors are absent from each meeting? <i class="fa fa-info-circle info-icon" data-tooltip=" Dummy text"></i></label>
            <input type="number" id="avgAbsence" name="avgAbsence" required>
          </div>
        </div>
      </div>

      <div class="section">
        <h4>Board Oversight on ESG Issues</h4>
        <div class="tab-3-box">
          <div class="input-box">
            <label for="humanRights">Has the organisation disclosed ESG-related policies for human rights and
              engagement
              activities? <i class="fa fa-info-circle info-icon" data-tooltip=" Dummy text"></i></label>
            <input type="checkbox" id="humanRights" name="humanRights">
          </div>

          <div class="input-box">
            <label for="indigenousPeoples">Has the organisation disclosed policies for indigenous peoples, local
              communities, and other stakeholders? <i class="fa fa-info-circle info-icon" data-tooltip=" Dummy text"></i></label>
            <input type="checkbox" id="indigenousPeoples" name="indigenousPeoples">
          </div>

          <div class="input-box">
            <label for="corporateDisclosure">Has the organisation disclosed policies for corporate disclosure? <i class="fa fa-info-circle info-icon" data-tooltip=" Dummy text"></i></label>
            <input type="checkbox" id="corporateDisclosure" name="corporateDisclosure">
          </div>

          <div class="input-box">
            <label for="whistleBlowerProtection">Has the organisation disclosed policies for the protection of
              whistle-blowers? <i class="fa fa-info-circle info-icon" data-tooltip=" Dummy text"></i></label>
            <input type="checkbox" id="whistleBlowerProtection" name="whistleBlowerProtection">
          </div>

          <div class="input-box">
            <label for="animalWelfare">Has the organisation disclosed policies for animal welfare? <i class="fa fa-info-circle info-icon" data-tooltip=" Dummy text"></i></label>
            <input type="checkbox" id="animalWelfare" name="animalWelfare">
          </div>

          <div class="input-box">
            <label for="politicalEngagement">Has the organisation disclosed policies for political engagement and
              lobbying? <i class="fa fa-info-circle info-icon" data-tooltip=" Dummy text"></i></label>
            <input type="checkbox" id="politicalEngagement" name="politicalEngagement">
          </div>

          <div class="input-box">
            <label for="corruptionPrevention">Has the organisation disclosed policies for the prevention and detection
              of corruption and bribery? <i class="fa fa-info-circle info-icon" data-tooltip=" Dummy text"></i></label>
            <input type="checkbox" id="corruptionPrevention" name="corruptionPrevention">
          </div>

          <div class="input-box">
            <label for="corruptionIncidents">Has the organisation reported confirmed incidents of corruption and
              bribery? <i class="fa fa-info-circle info-icon" data-tooltip=" Dummy text"></i></label>
            <input type="checkbox" id="corruptionIncidents" name="corruptionIncidents">
          </div>
        </div>
      </div>
      
     
 
      <div class="error"></div>
    </form>
  </div>

  <!-- Substep 2-2 -->
  <div class="substep" data-substep="2-2">
    <form method="post" id="SocialImpact">
      <div class="section">
        <h4>Expenditure Disclosure</h4>
        <div class="tab-3-box">
          <div class="input-box">
            <label for="politicalCampaignExpenditure">Political campaigns/candidates expenditure in the last 5
              years: <i class="fa fa-info-circle info-icon" data-tooltip=" Dummy text"></i></label>
            <input type="number" id="politicalCampaignExpenditure" name="politicalCampaignExpenditure" required>
          </div>

          <div class="input-box">
            <label for="advocacyExpenditure">Advocacy/lobbying firms/organisations expenditure in the last 5
              years: <i class="fa fa-info-circle info-icon" data-tooltip=" Dummy text"></i></label>
            <input type="number" id="advocacyExpenditure" name="advocacyExpenditure" required>
          </div>

          <div class="input-box">
            <label for="tradeAssociationsExpenditure">Business/trade associations/industry groups expenditure in the
              last 5 years: <i class="fa fa-info-circle info-icon" data-tooltip=" Dummy text"></i></label>
            <input type="number" id="tradeAssociationsExpenditure" name="tradeAssociationsExpenditure" required>
          </div>
        </div>
      </div>

      <div class="section">
        <h4>Management and Stakeholder Participation</h4>
        <div class="tab-3-box">
          <div class="input-box">
            <label for="managementRole">Has the organisation disclosed management’s role in ESG-related dependencies,
              risks, and opportunities? <i class="fa fa-info-circle info-icon" data-tooltip=" Dummy text"></i></label>
            <input type="checkbox" id="managementRole" name="managementRole">
          </div>

          <div class="input-box">
            <label for="stakeholderParticipation">Does the organisation disclose mechanisms for non-employee stakeholder
              participation in strategic decision-making? <i class="fa fa-info-circle info-icon" data-tooltip=" Dummy text"></i></label>
            <input type="checkbox" id="stakeholderParticipation" name="stakeholderParticipation">
          </div>
        </div>
      </div>

      <div class="section">
        <h4>Research and Development</h4>
        <div class="tab-3-box">
          <div class="input-box">
            <label for="RnDExpenditure">Total expenditure on Research and Development in the last twelve months: <i class="fa fa-info-circle info-icon" data-tooltip=" Dummy text"></i></label>
            <input type="number" id="RnDExpenditure" name="RnDExpenditure" required>
          </div>
        </div>
      </div>

      <div class="section">
        <h4>Supplier Payments</h4>
        <div class="tab-3-box">
          <div class="input-box">
            <label for="totalPayments">Estimate how many payments to suppliers were made in the last twelve
              months? <i class="fa fa-info-circle info-icon" data-tooltip=" Dummy text"></i></label>
            <input type="number" id="totalPayments" name="totalPayments" required>
          </div>
          <div class="input-box">
            <label for="paymentsOnTime">Estimate how many payments were made within agreed terms of trade? <i class="fa fa-info-circle info-icon" data-tooltip=" Dummy text"></i></label>
            <input type="number" id="paymentsOnTime" name="paymentsOnTime" required>
          </div>
        </div>
      </div>

      <div class="section">
        <h4>Purchases and Accounts Payable</h4>
        <div class="tab-3-box">
          <div class="input-box">
            <label for="totalPurchases">Estimated total amount of purchases or cost of goods in the last twelve
              months: <i class="fa fa-info-circle info-icon" data-tooltip=" Dummy text"></i></label>
            <input type="number" id="totalPurchases" name="totalPurchases" required>
          </div>
          <div class="input-box">
            <label for="outstandingPurchases">Estimated current amount of outstanding purchases or accounts
              payable: <i class="fa fa-info-circle info-icon" data-tooltip=" Dummy text"></i></label>
            <input type="number" id="outstandingPurchases" name="outstandingPurchases" required>
          </div>
        </div>
      </div>

      <div class="section">
        <h4>Donations</h4>
        <div class="tab-3-box">
          <div class="input-box">
            <label for="charityDonations">How much money has been donated to registered charities in the past twelve
              months? <i class="fa fa-info-circle info-icon" data-tooltip=" Dummy text"></i></label>
            <input type="number" id="charityDonations" name="charityDonations" required>
          </div>
        </div>
      </div>

      <div class="section">
        <h4>Fines</h4>
        <div class="tab-3-box">
          <div class="input-box">
            <label for="totalFines">Total of all fines paid or payable due to unlawful behaviors in the last twelve
              months: <i class="fa fa-info-circle info-icon" data-tooltip=" Dummy text"></i></label>
            <input type="number" id="totalFines" name="totalFines" required>
          </div>
          <div class="input-box">
            <label for="finesPublicDisclosure">Are the details and amounts of fines publicly disclosed? <i class="fa fa-info-circle info-icon" data-tooltip=" Dummy text"></i></label>
            <input type="checkbox" id="finesPublicDisclosure" name="finesPublicDisclosure">
          </div>
        </div>
      </div>

      <div class="section">
        <h4>Commercial and Sustainability Policies</h4>
        <div class="tab-3-box">
          <div class="input-box">
            <label for="policyAlignment">Does the organisation have policies ensuring consistency between commercial and
              sustainability goals? <i class="fa fa-info-circle info-icon" data-tooltip=" Dummy text"></i></label>
            <input type="checkbox" id="policyAlignment" name="policyAlignment">
          </div>

          <div class="input-box">
            <label for="supplierPolicies">Does the organisation have policies against negative social and environmental
              outcomes for its suppliers? <i class="fa fa-info-circle info-icon" data-tooltip=" Dummy text"></i></label>
            <input type="checkbox" id="supplierPolicies" name="supplierPolicies">
          </div>

          <div class="input-box">
            <label for="workerCapacity">Does the organisation provide workers in its supply chains with the capacity to
              contest and shape the upgrading of supply chains? <i class="fa fa-info-circle info-icon" data-tooltip=" Dummy text"></i></label>
            <input type="checkbox" id="workerCapacity" name="workerCapacity">
          </div>

          <div class="input-box">
            <label for="financialSupport">Does the organisation provide financial support or incentives to suppliers to
              upgrade their labor standards? <i class="fa fa-info-circle info-icon" data-tooltip=" Dummy text"></i></label>
            <input type="checkbox" id="financialSupport" name="financialSupport">
          </div>

          <div class="input-box">
            <label for="percentageSuppliersIncentives">What percentage of suppliers and/or facilities receive such
              incentives? <i class="fa fa-info-circle info-icon" data-tooltip=" Dummy text"></i></label>
            <input type="number" id="percentageSuppliersIncentives" name="percentageSuppliersIncentives" required>
          </div>
        </div>
      </div>
      <div class="error"></div>
      
       <!--<input type="submit" name="submit">-->
    </form>
  </div>

  <div class="substep" data-substep="2-3">
    <form method="post" id="GovernanceForm">
      <div class="section">
        <h4>Work Hours</h4>
        <div class="tab-3-box">
          <div class="input-box">
            <label for="totalWorkHours">Total hours worked in the organisation in the last twelve months:  <i class="fa fa-info-circle info-icon" data-tooltip=" Dummy text"></i></label>
            <input type="number" id="totalWorkHours" name="totalWorkHours" required>
          </div>

          <div class="input-box">
            <label for="volunteerHours">How many hours of employee work time have been used for volunteer
              activities? <i class="fa fa-info-circle info-icon" data-tooltip=" Dummy text"></i></label>
            <input type="number" id="volunteerHours" name="volunteerHours" required>
          </div>
        </div>
      </div>

      <div class="section">
        <h4>Harassment and Discrimination</h4>
        <div class="tab-3-box">
          <div class="input-box">
            <label for="harassmentPolicies">Has the organisation made public and trained staff regarding harassment and
              discrimination policies? <i class="fa fa-info-circle info-icon" data-tooltip=" Dummy text"></i></label>
            <input type="checkbox" id="harassmentPolicies" name="harassmentPolicies">
          </div>

          <div class="input-box">
            <label for="harassmentIncidents">Has the organisation disclosed any incidents of harassment and
              discrimination? <i class="fa fa-info-circle info-icon" data-tooltip=" Dummy text"></i></label>
            <input type="checkbox" id="harassmentIncidents" name="harassmentIncidents">
          </div>

          <div class="input-box">
            <label for="safeguardsForRetaliation">Has the organisation established safeguards to prevent retaliation and
              protect confidentiality? <i class="fa fa-info-circle info-icon" data-tooltip=" Dummy text"></i></label>
            <input type="checkbox" id="safeguardsForRetaliation" name="safeguardsForRetaliation">
          </div>
        </div>
      </div>

      <div class="section">
        <h4>Labour Rights and Grievances</h4>
        <div class="tab-3-box">
          <div class="input-box">
            <label for="accessToRemedy">Does the organisation disclose internal and external mechanisms for access to
              remedy for labour rights issues? <i class="fa fa-info-circle info-icon" data-tooltip=" Dummy text"></i></label>
            <input type="checkbox" id="accessToRemedy" name="accessToRemedy">
          </div>

          <div class="input-box">
            <label for="grievanceProcedures">Does the organisation have clear procedures for the grievance
              process? <i class="fa fa-info-circle info-icon" data-tooltip=" Dummy text"></i></label>
            <input type="checkbox" id="grievanceProcedures" name="grievanceProcedures">
          </div>

          <div class="input-box">
            <label for="publiclyReportedCases">Has the organisation publicly reported any cases where access to remedy
              has been demanded? <i class="fa fa-info-circle info-icon" data-tooltip=" Dummy text"></i></label>
            <input type="checkbox" id="publiclyReportedCases" name="publiclyReportedCases">
          </div>
        </div>
      </div>

      <div class="section">
        <h4>Employee Metrics</h4>
        <div class="tab-3-box">
          <div class="input-box">
            <label for="employeesLeft">Total number of employees who left during the year: <i class="fa fa-info-circle info-icon" data-tooltip=" Dummy text"></i></label>
            <input type="number" id="employeesLeft" name="employeesLeft" required>
          </div>

          <div class="input-box">
            <label for="avgEmployees">Average number of employees during the year: <i class="fa fa-info-circle info-icon" data-tooltip=" Dummy text"></i></label>
            <input type="number" id="avgEmployees" name="avgEmployees" required>
          </div>
          
          
           <div class="input-box">
            <label for="Email">Email: <i class="fa fa-info-circle info-icon" data-tooltip=" Dummy text"></i></label>
            <input type="text" id="calculator-email-Governance" name="Email" required>
          </div>
          
        </div>
      </div>
      <div class="error"></div>
    </form>
  </div>

  
  <button type="button" id="clickGovernance" class="clickGovernance">submit</button>
</div>
<div class="Governancerestult"></div>
<button id="GovernancerestultDownloadPDF" style="display:none;">Download</button>
<!-- Step 3 -->
<div class="step" data-step="3">
  <!-- <h4>Step 3</h4> -->
  <div class="subtabs">
    <div class="subtab active" data-substep="3-1">Adequate Wages</div>
    <div class="subtab" data-substep="3-2">Child Labour</div>
    <div class="subtab" data-substep="3-3">Diversity</div>
    <div class="subtab" data-substep="3-4">Equity</div>
    <div class="subtab" data-substep="3-5">Forced Labour</div>
    <div class="subtab" data-substep="3-6">Health and Safety</div>
    <div class="subtab" data-substep="3-7">Inclusion</div>
    <div class="subtab" data-substep="3-8">Secure Employment</div>
    <div class="subtab" data-substep="3-9">Social Dialoguet</div>
    <div class="subtab" data-substep="3-10">Training and Development</div>
    <div class="subtab" data-substep="3-11">Work-Life Balance</div>
    <div class="subtab" data-substep="3-12">SUMMARY</div>
  </div>

  <!-- Substep 3-1 -->
  <div class="substep active" data-substep="3-1">
    <!-- CEO-to-Worker Pay Ratio -->
    <div class="section">
      <h4>CEO-to-Worker Pay Ratio  </h4>
      <div class="tab-2-box">
        <div class="input-box">
          <label for="ceoCompensation">CEO Compensation (CC):<i class="fa fa-info-circle info-icon" data-tooltip="CWP is the CEO: worker pay ratio, CC is CEO 
compensation, WC is the median compensation of 
the lowest-paid quartile of workers, t is a specific 
year, and 30 is the normative maximum CEO: 
worker pay ratio in any year"></i></label>
          <input type="number" id="ceoCompensation" name="ceoCompensation" required>
        </div>
        <div class="input-box">
          <label for="medianWorkerCompensation">Median Worker Compensation (WC): <i class="fa fa-info-circle info-icon" data-tooltip=" Dummy text"></i></label>
          <input type="number" id="medianWorkerCompensation" name="medianWorkerCompensation" required>
        </div>
      </div>
    </div>


    <!-- Median Wage -->
    <div class="section">
      <h4>Median Wage</h4>
      <div class="tab-2-box">
        <div class="input-box">
          <label for="totalWages">Total Wages Paid: <i class="fa fa-info-circle info-icon" data-tooltip=" Dummy text"></i></label>
          <input type="number" id="totalWages" name="totalWages" required>
        </div>

        <div class="input-box">
          <label for="totalStaff">Total Number of Staff: <i class="fa fa-info-circle info-icon" data-tooltip=" Dummy text"></i></label>
          <input type="number" id="totalStaff" name="totalStaff" required>
        </div>
      </div>
    </div>


    <div class="error"></div>
  </div>

  <!-- Substep 3-2 -->
  <div class="substep" data-substep="3-2">
    <!-- Child Labour Policy -->
    <div class="section">
      <h4>Child Labour Policy</h4>
      <label>Do you have and implement a policy for: <i class="fa fa-info-circle info-icon" data-tooltip=" Dummy text"></i></label>
      <div class="tab-2-box">
        <div class="input-box">
          <input type="checkbox" id="childLabour" name="childLabour" value="childLabour">
          <label for="childLabour">Identifying where child labour occurs <i class="fa fa-info-circle info-icon" data-tooltip=" Dummy text"></i></label>
        </div>
        <div class="input-box">
          <input type="checkbox" id="hazardousWork" name="hazardousWork" value="hazardousWork">
          <label for="hazardousWork">Identifying exposure of young workers to hazardous work <i class="fa fa-info-circle info-icon" data-tooltip=" Dummy text"></i></label>
        </div>
        <div class="input-box">
          <input type="checkbox" id="riskPrevention" name="riskPrevention" value="riskPrevention">
          <label for="riskPrevention">Preventing risk of exposure <i class="fa fa-info-circle info-icon" data-tooltip=" Dummy text"></i></label>
        </div>
      </div>
    </div>
    <div class="error"></div>
  </div>

  <!-- Substep 3-3 -->
  <div class="substep" data-substep="3-3">
    <!-- Proportion of Women in Managerial Positions -->
    <div class="section">
      <h4>Proportion of Women in Managerial Positions</h4>
      <div class="tab-2-box">
        <div class="input-box">
          <label for="totalWomenManagers">Total Women Managers (TWM): <i class="fa fa-info-circle info-icon" data-tooltip=" Dummy text"></i></label>
          <input type="number" id="totalWomenManagers" name="totalWomenManagers" required>
        </div>

        <div class="input-box">
          <label for="totalManagers">Total Managers (TNM): <i class="fa fa-info-circle info-icon" data-tooltip=" Dummy text"></i></label>
          <input type="number" id="totalManagers" name="totalManagers" required>
        </div>
      </div>
    </div>
    <!-- Women Board Members -->
    <div class="section">
      <h4>Women Board Members</h4>
      <div class="tab-2-box">
        <div class="input-box">
          <label for="womenBoardPercentage">Percentage of Women on the Board (WB): <i class="fa fa-info-circle info-icon" data-tooltip=" Dummy text"></i></label>
          <input type="number" id="womenBoardPercentage" name="womenBoardPercentage" required>
        </div>
      </div>
    </div>


    <div class="error"></div>
  </div>

  <!-- Substep 3-4 -->
  <div class="substep" data-substep="3-4">
    <!-- Gender Pay Gap -->
    <div class="section">
      <h4>Gender Pay Gap</h4>
      <div class="tab-2-box">
        <div class="input-box">
          <label for="medianMensPay">Median Men's Pay: <i class="fa fa-info-circle info-icon" data-tooltip=" Dummy text"></i></label>
          <input type="number" id="medianMensPay" name="medianMensPay" required>
        </div>

        <div class="input-box">
          <label for="medianWomensPay">Median Women's Pay: <i class="fa fa-info-circle info-icon" data-tooltip=" Dummy text"></i></label>
          <input type="number" id="medianWomensPay" name="medianWomensPay" required>
        </div>
      </div>
    </div>

    <div class="error"></div>
  </div>

  <!-- Substep 3-5 -->
  <div class="substep" data-substep="3-5">
    <!-- Forced Labour Policy -->
    <div class="section">
      <h4>Forced Labour Policy</h4>
      <label>Do you implement a policy for:</label>
      <div class="tab-2-box">
        <div class="input-box">
          <input type="checkbox" id="forcedLabourPolicy" name="forcedLabourPolicy">
          <label for="forcedLabourPolicy">Identifying where forced labour occurs <i class="fa fa-info-circle info-icon" data-tooltip=" Dummy text"></i></label>
        </div>
        <div class="input-box">
          <input type="checkbox" id="reducingRisk" name="reducingRisk">
          <label for="reducingRisk">Reducing risk of forced labour <i class="fa fa-info-circle info-icon" data-tooltip=" Dummy text"></i></label>
        </div>
      </div>
    </div>
    <div class="error"></div>
  </div>

  <!-- Substep 3-6 -->
  <div class="substep" data-substep="3-6">
    <!-- Health and Safety Metrics -->
    <div class="section">
      <h4>Health and Safety Metrics</h4>
      <div class="tab-2-box">
        <div class="input-box">
          <label for="newInjuryCases">Number of New Injury Cases: <i class="fa fa-info-circle info-icon" data-tooltip=" Dummy text"></i></label>
          <input type="number" id="newInjuryCases" name="newInjuryCases" required>
        </div>

        <div class="input-box">
          <label for="totalHoursWorked">Total Hours Worked: <i class="fa fa-info-circle info-icon" data-tooltip=" Dummy text"></i></label>
          <input type="number" id="totalHoursWorked" name="totalHoursWorked" required>
        </div>

        <div class="input-box">
          <label for="frequencyRate">Frequency Rate of Occupational Injuries: <i class="fa fa-info-circle info-icon" data-tooltip=" Dummy text"></i></label>
          <input type="number" id="frequencyRate" name="frequencyRate" placeholder="Auto-calculated" disabled>
        </div>

        <div class="input-box">
          <label for="lostDays">Total Lost Days: <i class="fa fa-info-circle info-icon" data-tooltip=" Dummy text"></i></label>
          <input type="number" id="lostDays" name="lostDays" required>
        </div>

        <div class="input-box">
          <label for="incidentRate">Incident Rate of Occupational Injuries: <i class="fa fa-info-circle info-icon" data-tooltip=" Dummy text"></i></label>
          <input type="number" id="incidentRate" name="incidentRate" placeholder="Auto-calculated" disabled>
        </div>

        <div class="input-box">
          <label for="healthSafetyCoverage">Percentage of Employees Covered by Health and Safety System: <i class="fa fa-info-circle info-icon" data-tooltip=" Dummy text"></i></label>
          <input type="number" id="healthSafetyCoverage" name="healthSafetyCoverage" required>
        </div>
      </div>
    </div>
    <div class="error"></div>
  </div>

  <!-- Substep 3-7 -->
  <div class="substep" data-substep="3-7">
    <!-- Disability Inclusion Rate -->
    <div class="section">
      <h4>Disability Inclusion Rate</h4>
      <div class="tab-2-box">
        <div class="input-box">
          <label for="employeesWithDisabilities">Number of Employees with Disabilities: <i class="fa fa-info-circle info-icon" data-tooltip=" Dummy text"></i></label>
          <input type="number" id="employeesWithDisabilities" name="employeesWithDisabilities" required>
        </div>

        <div class="input-box">
          <label for="totalWorkforce">Total Workforce: <i class="fa fa-info-circle info-icon" data-tooltip=" Dummy text"></i></label>
          <input type="number" id="totalWorkforce" name="totalWorkforce" required>
        </div>
      </div>
    </div>
    <div class="error"></div>
  </div>

  <!-- Substep 3-8 -->
  <div class="substep" data-substep="3-8">
    <!-- Secure Employment Contracts -->
    <div class="section">
      <h4>Secure Employment Contracts</h4>
      <div class="tab-2-box">
        <div class="input-box">
          <label for="permanentContracts">Number of Employees with Permanent Contracts: <i class="fa fa-info-circle info-icon" data-tooltip=" Dummy text"></i></label>
          <input type="number" id="permanentContracts" name="permanentContracts" required>
        </div>

        <div class="input-box">
          <label for="zeroHourContracts">Number of Employees on Zero-Hour Contracts: <i class="fa fa-info-circle info-icon" data-tooltip=" Dummy text"></i></label>
          <input type="number" id="zeroHourContracts" name="zeroHourContracts" required>
        </div>
      </div>
    </div>

    <div class="error"></div>
  </div>

  <!-- Substep 3-9 -->
  <div class="substep" data-substep="3-9">
    <!-- Representation and Freedom of Association -->
    <div class="section">
      <h4>Representation and Freedom of Association</h4>
      <label>Do you have:</label>
      <div class="tab-2-box">
        <div class="input-box">
          <input type="checkbox" id="workplaceCommittees" name="workplaceCommittees">
          <label for="workplaceCommittees">Representation on Workplace Committees <i class="fa fa-info-circle info-icon" data-tooltip=" Dummy text"></i></label>
        </div>
        <div class="input-box">
          <input type="checkbox" id="boardRepresentation" name="boardRepresentation">
          <label for="boardRepresentation">Representation at Board Level <i class="fa fa-info-circle info-icon" data-tooltip=" Dummy text"></i></label>
        </div>
        <div class="input-box">
          <input type="checkbox" id="tradeUnions" name="tradeUnions">
          <label for="tradeUnions">Active Trade Unions or Works Councils <i class="fa fa-info-circle info-icon" data-tooltip=" Dummy text"></i></label>
        </div>
      </div>
    </div>
    <div class="error"></div>
  </div>

  <!-- Substep 3-10 -->
  <div class="substep" data-substep="3-10">
    <!-- Training Hours -->
    <div class="section">
      <h4>Training Hours</h4>
      <div class="tab-2-box">
        <div class="input-box">
          <label for="trainingHours">Total Number of Training Hours Provided: <i class="fa fa-info-circle info-icon" data-tooltip=" Dummy text"></i></label>
          <input type="number" id="trainingHours" name="trainingHours" required>
        </div>
      </div>
    </div>

    <div class="error"></div>
  </div>

  <!-- Substep 3-11 -->
  <div class="substep" data-substep="3-11">
    <!-- Work-Life Balance -->
    <div class="section">
      <h4>Work-Life Balance</h4>
      <label>Do you provide:</label>
      <div class="tab-2-box">
        <div class="input-box">
          <input type="checkbox" id="familyLeave" name="familyLeave">
          <label for="familyLeave">Family-Related Leave <i class="fa fa-info-circle info-icon" data-tooltip=" Dummy text"></i></label>
        </div>
        <div class="input-box">
          <input type="checkbox" id="flexibleWorking" name="flexibleWorking">
          <label for="flexibleWorking">Flexible Working Hours <i class="fa fa-info-circle info-icon" data-tooltip=" Dummy text"></i></label>
        </div>
        <div class="input-box">
          <input type="checkbox" id="childcareAccess" name="childcareAccess">
          <label for="childcareAccess">Access to Childcare <i class="fa fa-info-circle info-icon" data-tooltip=" Dummy text"></i></label>
        </div>
      </div>
    </div>

    <div class="error"></div>
  </div>

  <!-- Substep 3-12 -->
  <div class="substep" data-substep="3-12">
    <div class="form-section">
      <h2>Summary</h2>
      <div class="tab-2-box">
        <div class="input-box">
          <label for="summary">Summary</label>
          <input type="text" id="summary" name="summary">
        </div>
        <div class="input-box">
            <label for="Email">Email</label>
            <input type="text" id="calculator-email-social" name="Email" required>
          </div>
      </div>
      
    </div>
    <div class="error"></div>
  </div>



  <!-- <button type="button" class="prev">Previous</button> -->
  <button type="submit" id="generateReport">Submit</button>
</div>


<!-- Step 1 -->
<div class="step active " data-step="1">
  <!-- <h4>Step 1</h4> -->
  <h3 class="heading_group">Your company overview details</h3>
  <div class="subtabs">
    <div class="subtab active" data-substep="1-1">Oil Products</div>
    <div class="subtab" data-substep="1-2">Natural Gas</div>
    <div class="subtab" data-substep="1-3">Coal</div>
  </div>

  <!-- Substep 1-1 -->
  <div class="substep active" data-substep="1-1">
    
    <div class="substep-inner-box">
      <div class="main-input-box">
        <div class="input-box">
          <label for="OrganisationName">Organisation Name: </label>
          <input type="text" id="OrganisationName" name="OrganisationName" required>
        </div>

        <div class="input-box">
          <label for="OrganisationName">Location: </label>
          <?php
          echo do_shortcode('[country_region_select]');
          ?>
        </div>
        <div class="input-box">
          <label for="reporting_period">Select a Reporting Year: </label>
          <!-- <select name="reporting_period" id="reporting_period">
              <option value="" disabled selected>Select a year</option>
            </select> -->

          <?php
          echo do_shortcode('[reporting_period_dropdown]');
          ?>
        </div>

        <div class="input-box">
          <label for="electricity_consumption">Electricity Consumption:</label>
          <input type="number" id="electricity_consumption" name="electricity_consumption"
            placeholder="Enter value in KWh/Annually" min="0" step="1" required>
        </div>
        <div id="data-results"></div>
      </div>

      <h2>Travels / Transports</h2>
      <h4>Personal Transportation Medium</h4>
      <div id="vehicleRows">

        <!-- Initial Vehicle Row -->
        <div class="form-row">

          <div class="main-input-box">
            <div class="input-box">
              <label for="vehicle_type">Select Vehicle Type and Year:</label>
              <?php //echo do_shortcode('[public_transportation]'); ?>
              <div class="public_tranpost_data_s"></div>

              <select name="distance_unit[]" id="distance_unit">
                <option value="miles">Miles</option>
                <option value="km">KM </option>
              </select>
            </div>

            <div class="input-box">
              <label for="distance_traveled">Distance: <i class="fa fa-info-circle info-icon" data-tooltip="Total Travelled distance for selected item"></i></label>
              <input type="number" name="distance_traveled[]" id="distance_traveled" placeholder="Enter Distance"
                min="0" step="1" required>
            </div>

            <div class="input-box">
              <div id="distance_traveled-results"></div>
              <div id="emission-results"></div>
              <!--<button type="button" class="remove-btn" onclick="removeRow(this)">Remove Row</button>-->
            </div>

          </div>
        </div>
      </div>

      <button type="button" id="addRowBtn">Add Another Row</button>

      <h4>Public Transportation Medium</h4>

      <div id="transportSection">
        <div class="transportRow">
          <div class="input-box">
            <label for="vehicle_type">Select Vehicle Type and Year:</label>
            <?php echo do_shortcode('[public_transport]'); ?>

            <select name="distance_unit[]" id="distance_unit">
              <option value="miles">Miles</option>
              <option value="km">KM </option>
            </select>
          </div>
          <div class="input-box">
            <label for="distance_traveled">Distance:  <i class="fa fa-info-circle info-icon" data-tooltip="Total Travelled distance for selected item"></i></label>
            <input type="number" name="public_transport[]" id="public_transport" placeholder="Enter Distance">

            <div id="public_transport-results"></div>
          </div>
        </div>
      </div>

      <button type="button" onclick="addTransportRow()">Add Another</button>
      <br><br>

      <h4>Freight Transport</h4>
      <div id="transportSectionFreight">
        <div class="transportRowFreight">
          <div class="input-box">
            <label for="vehicle_type">Select Vehicle Type and Year:</label>
            <?php echo do_shortcode('[transportSectionFreight]'); ?>
            <select name="distance_unit[]" id="distance_unit">
              <option value="miles">Miles</option>
              <option value="km">KM </option>
            </select>
          </div>
          <div class="input-box">
            <label for="distance_traveled">Distance:  <i class="fa fa-info-circle info-icon" data-tooltip="Total Travelled distance for selected item"></i></label>
            <input type="number" name="distance[]" id="Freightdistance" class="Freightdistance"
              placeholder="Enter Distance">
            <div id="freight-results"></div>
          </div>
        </div>
      </div>

      <button type="button" onclick="addTransportRowFreight()">Add Another</button>




           <!--- REFRIGERANTS, ONLINE SERVICES and WASTE-->

           <div class="section">
        <h4>REFRIGERANTS, ONLINE SERVICES and WASTE</h4>
        <div class="tab-3-box">
          <h3>Refrigeration</h3><div class="input-box">
            
            </div>
          <div class="input-box">
            <label for="domesticrefrigeration">Domestic Refrigeration:  <i class="fa fa-info-circle info-icon" data-tooltip="Total weight in Kgs annually"></i></label>
            <input type="number" id="domesticrefrigeration" placeholder="Kgs" name="domesticrefrigeration" required>
          </div>
          
          <div class="input-box">
            <label for="industrialrefrigerationprocesses">Industrial Refrigeration: <i class="fa fa-info-circle info-icon" data-tooltip="Total weight in Kgs annually"></i></label>
            <input type="number" id="industrialrefrigerationprocesses" placeholder="Kgs" name="industrialrefrigerationprocesses" required>
          </div>
          <div class="input-box">
            
            </div>
        <br>
          <h3>Waste</h3><div class="input-box">
            
            </div>
          <div class="input-box">
            <label for="Waste">Waste: <i class="fa fa-info-circle info-icon" data-tooltip="Total weight in Kgs annually"></i></label>
            <input type="number" id="Waste" placeholder="Kgs" name="Waste" required>
          </div>
           

          <br>
          <h3>Online Services</h3>
          <div class="input-box">
            
          </div>
          <div class="input-box">
            <label for="Email">Email :  <i class="fa fa-info-circle info-icon" data-tooltip="Total number of emails exchanged annually"></i></label>
            <input type="text" id="calculator-email" name="Email" placeholder="Counts of emails" required>
          </div>
          <div class="input-box">
            <label for="cloudhosting">Cloud Hosting  <i class="fa fa-info-circle info-icon" data-tooltip="Total space storage taken in TB (Terrabyte) annually."></i></label>
            <input type="number" id="cloudhosting" placeholder="Space Storage" name="cloudhosting" required>
          </div>
        </div>
      </div>
      <div class="error"></div>
      <input type="button" name="submitfirst" value="Submit" id="submit-action-report-generation">
    </div>
  </div>

  <!-- Substep 1-2 -->
  <div class="substep" data-substep="1-2">
    <!-- <label for="gas">Natural Gas: </label>
      <input type="text" id="gas" name="gas" required>
      <div class="error"></div> -->
  </div>

  <!-- Substep 1-3 -->
  <div class="substep" data-substep="1-3">
    <!-- <label for="coal">Coal: </label>
      <input type="text" id="coal" name="coal" required>
      <div class="error"></div> -->
  </div>

  <!-- <button type="button" class="submit">submit</button> -->
</div>

 

<div id="calculationResults" style="display:none; margin-top: 20px; border: 1px solid #ddd; padding: 20px;">
  <h2>Social Impact Result</h2>
  <table border="1" cellpadding="10" cellspacing="0" style="width: 100%; border-collapse: collapse;">
    <thead>
      <tr>
        <th>Metric</th>
        <th>Value</th>
      </tr>
    </thead>
    <tbody id="resultsTableBody">
      <!-- Populated dynamically -->
    </tbody>
  </table>
  <button id="DownloadPDFforSocialImpact">Download PDF</button>
</div>



<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"></script>

<script>

  document.getElementById('generateReport').addEventListener('click', function () {
    const results = [];
    let cwp, medianWage, pwm, rwbt, gpg, frequencyRate, incidentRate, dir, ahpa;

    // CEO-to-Worker Pay Ratio
    const ceoCompensation = Number(document.getElementById('ceoCompensation').value);
    const medianWorkerCompensation = Number(document.getElementById('medianWorkerCompensation').value);
    if (ceoCompensation > 0 && medianWorkerCompensation > 0) {
      cwp = (ceoCompensation / medianWorkerCompensation) / 30;
      results.push({ metric: "CEO-to-Worker Pay Ratio", value: cwp.toFixed(2) });
    }

    // Median Wage
    const totalWages = Number(document.getElementById('totalWages').value);
    const totalStaff = Number(document.getElementById('totalStaff').value);
    if (totalWages > 0 && totalStaff > 0) {
      medianWage = totalWages / totalStaff;
      results.push({ metric: "Median Wage", value: medianWage.toFixed(2) });
    }

    // Child Labour Policy
    const childLabour = document.getElementById('childLabour').checked ? "✔️ Yes" : "❌ No" ; 
    results.push({ metric: "Child Labour Policy - Identifying child labour", value: childLabour });

    const hazardousWork = document.getElementById('hazardousWork').checked ? "✔️ Yes" : "❌ No" ; 
    results.push({ metric: "Child Labour Policy - Identifying hazardous work", value: hazardousWork });

    const riskPrevention = document.getElementById('riskPrevention').checked ? "✔️ Yes" : "❌ No" ; 
    results.push({ metric: "Child Labour Policy - Preventing risk", value: riskPrevention });

    // Percentage of Women Managers
    const totalWomenManagers = Number(document.getElementById('totalWomenManagers').value);
    const totalManagers = Number(document.getElementById('totalManagers').value);
    if (totalWomenManagers > 0 && totalManagers > 0) {
      pwm = (totalWomenManagers / totalManagers) * 100;
      results.push({ metric: "Percentage of Women Managers", value: pwm.toFixed(2) + "%" });
    }

    // Women Board Members Ratio
    const womenBoardPercentage = Number(document.getElementById('womenBoardPercentage').value);
    if (womenBoardPercentage > 0) {
      rwbt = womenBoardPercentage / 40;
      results.push({ metric: "Women Board Members Ratio", value: rwbt.toFixed(2) });
    }

    // Gender Pay Gap
    const medianMensPay = Number(document.getElementById('medianMensPay').value);
    const medianWomensPay = Number(document.getElementById('medianWomensPay').value);
    if (medianMensPay > 0 && medianWomensPay > 0) {
      gpg = ((medianMensPay - medianWomensPay) / medianMensPay) * 100;
      results.push({ metric: "Gender Pay Gap", value: gpg.toFixed(2) + "%" });
    }

    // Frequency Rate
    const newInjuryCases = Number(document.getElementById('newInjuryCases').value);
    const totalHoursWorked = Number(document.getElementById('totalHoursWorked').value);
    if (newInjuryCases > 0 && totalHoursWorked > 0) {
      frequencyRate = (newInjuryCases / totalHoursWorked) * 1_000_000;
      results.push({ metric: "Frequency Rate of Occupational Injuries", value: frequencyRate.toFixed(2) });
    }

    // Incident Rate
    const lostDays = Number(document.getElementById('lostDays').value);
    if (lostDays > 0 && totalHoursWorked > 0) {
      incidentRate = (lostDays / totalHoursWorked) * 1_000;
      results.push({ metric: "Incident Rate of Occupational Injuries", value: incidentRate.toFixed(2) });
    }

    // Disability Inclusion Rate
    const employeesWithDisabilities = Number(document.getElementById('employeesWithDisabilities').value);
    const totalWorkforce = Number(document.getElementById('totalWorkforce').value);
    if (employeesWithDisabilities > 0 && totalWorkforce > 0) {
      dir = (employeesWithDisabilities / totalWorkforce) * 100;
      results.push({ metric: "Disability Inclusion Rate", value: dir.toFixed(2) + "%" });
    }

    // Average Training Hours
    const trainingHours = Number(document.getElementById('trainingHours').value);
    if (trainingHours > 0 && totalHoursWorked > 0) {
      ahpa = trainingHours / totalHoursWorked;
      results.push({ metric: "Average Training Hours Per Employee", value: ahpa.toFixed(2) });
    }



    /***
     * Governance Fields Start
     */
    // Expenditure Disclosure
 /*
 const politicalExpenditure = Number(document.getElementById('politicalCampaignExpenditure').value);
    const advocacyExpenditure = Number(document.getElementById('advocacyExpenditure').value);
    const tradeExpenditure = Number(document.getElementById('tradeAssociationsExpenditure').value);
    const totalExpenditure = politicalExpenditure + advocacyExpenditure + tradeExpenditure;
    results.push({ metric: "Total Expenditure", value: `$${totalExpenditure}` });

    // Supplier Payments
    const totalPayments = Number(document.getElementById('totalPayments').value);
    const paymentsOnTime = Number(document.getElementById('paymentsOnTime').value);
    const paymentsOnTimePercentage = (paymentsOnTime / totalPayments) * 100;
    results.push({ metric: "Payments Made On Time (%)", value: `${paymentsOnTimePercentage.toFixed(2)}%` });

    // Purchases and Accounts Payable
    const totalPurchases = Number(document.getElementById('totalPurchases').value);
    const outstandingPurchases = Number(document.getElementById('outstandingPurchases').value);
    const outstandingRatio = (outstandingPurchases / totalPurchases) * 100;
    results.push({ metric: "Outstanding Purchases Ratio (%)", value: `${outstandingRatio.toFixed(2)}%` });

    // Work Hours
    const totalWorkHours = Number(document.getElementById('totalWorkHours').value);
    const volunteerHours = Number(document.getElementById('volunteerHours').value);
    const volunteerPercentage = (volunteerHours / totalWorkHours) * 100;
    results.push({ metric: "Volunteer Hours Percentage (%)", value: `${volunteerPercentage.toFixed(2)}%` });

    // Employee Metrics
    const employeesLeft = Number(document.getElementById('employeesLeft').value);
    const avgEmployees = Number(document.getElementById('avgEmployees').value);
    const turnoverRate = (employeesLeft / avgEmployees) * 100;
    results.push({ metric: "Employee Turnover Rate (%)", value: `${turnoverRate.toFixed(2)}%` });

*/
    /**
     * Governance Fields End
     */


    // Populate Results Table
    const tableBody = document.getElementById('resultsTableBody');
    tableBody.innerHTML = "";

    results.forEach(result => {

      const row = `<tr><td>${result.metric}</td><td>${result.value}</td></tr>`;
    //   if (politicalExpenditure > 0) {
    //     row += `<tr><td><h3>Governance</h3></td></tr>`;
    //   }
      tableBody.innerHTML += row;
    });

    // Show Results
    document.getElementById('calculationResults').style.display = 'block';
  });


/*  document.getElementById('savePdf').addEventListener('click', function () {
    const reportContainer = document.getElementById('calculationResults');
    reportContainer.style.display = 'block'; // Ensure it's visible when generating the PDF

    const options = {
      margin: [0.5, 0.5, 0.5, 0.5], // Margins: top, right, bottom, left
      filename: 'Indicator_Calculation_Report.pdf',
      html2canvas: { scale: 2 },
      jsPDF: { unit: 'in', format: 'letter', orientation: 'portrait' }
    };

    html2pdf().from(reportContainer).set(options).toPdf().get('pdf').then(function (pdf) {
      const totalPages = pdf.internal.getNumberOfPages();
      for (let i = 1; i <= totalPages; i++) {
        pdf.setPage(i);
        pdf.setFontSize(10);
        pdf.text(`Page ${i} of ${totalPages}`, pdf.internal.pageSize.width - 1, pdf.internal.pageSize.height - 0.5);
      }
    }).save();

    reportContainer.style.display = 'none'; // Hide the container after saving PDF
  });*/

</script>



<script>

  jQuery(document).ready(function ($) {
    // Calculate emissions automatically when distance is entered
    $(".Freightdistance").on("input", function () {
      var countryId = $("#country-select").val(); // Get selected country ID
      var fuelTypeId = $("#FreightTransport").val(); // Get selected fuel type ID
      var distanceTraveled = parseFloat($(this).val()); // Get distance traveled
      var distanceUnit = $("#distance_unit").val();

      if (distanceUnit === "miles") {
        //  distanceTraveled = distanceTraveled * 1.60934; // 1 mile = 1.60934 km
      }

      if (countryId && fuelTypeId) {
        $.ajax({
          url: "<?php echo admin_url('admin-ajax.php'); ?>",
          type: "POST",
          data: {
            action: "display_freight_data",
            country_id: countryId,
            fuel_type_id: fuelTypeId,
            distance_traveled: distanceTraveled,
            distanceUnit: distanceUnit,

          },
          success: function (response) {
            $("#freight-results").html(response); // Display the results
          },
          error: function (jqXHR, textStatus, errorThrown) {
            console.log("AJAX error:", textStatus, errorThrown);
          }
        });
      } else {
        $("#freight-results").html("<p>Please select a country, fuel type, and enter a valid distance.</p>");
      }
    });
  });



  jQuery(document).ready(function ($) {
    // Calculate emissions automatically when distance is entered
    $("#public_transport").on("input", function () {
      var countryId = $("#country-select").val(); // Get selected country ID
      var fuelTypeId = $("#public_transportS").val(); // Get selected fuel type ID
      var distanceTraveled = parseFloat($(this).val()); // Get distance traveled
      var distanceUnit = $("#distance_unit").val();

      if (distanceUnit === "miles") {
        //  distanceTraveled = distanceTraveled * 1.60934; // 1 mile = 1.60934 km
      }

      if (countryId && fuelTypeId) {
        $.ajax({
          url: "<?php echo admin_url('admin-ajax.php'); ?>",
          type: "POST",
          data: {
            action: "display_public_transport_data",
            country_id: countryId,
            fuel_type_id: fuelTypeId,
            distance_traveled: distanceTraveled,
            distanceUnit: distanceUnit,

          },
          success: function (response) {
            $("#public_transport-results").html(response); // Display the results
          },
          error: function (jqXHR, textStatus, errorThrown) {
            console.log("AJAX error:", textStatus, errorThrown);
          }
        });
      } else {
        $("#public_transport-results").html("<p>Please select a country, fuel type, and enter a valid distance.</p>");
      }
    });
  });


  jQuery(document).ready(function ($) {
    // Calculate emissions automatically when distance is entered
    $("#distance_traveled").on("input", function () {
      var countryId = $("#country-select").val(); // Get selected country ID
      var fuelTypeId = $(".vehicle_pub_dataS").val(); // Get selected fuel type ID
      var distanceTraveled = parseFloat($(this).val()); // Get distance traveled
      var distanceUnit = $("#distance_unit").val();

      if (distanceUnit === "miles") {
        //  distanceTraveled = distanceTraveled * 1.60934; // 1 mile = 1.60934 km
      }

      if (countryId && fuelTypeId) {
        $.ajax({
          url: "<?php echo admin_url('admin-ajax.php'); ?>",
          type: "POST",
          data: {
            action: "display_Transportation_data",
            country_id: countryId,
            fuel_type_id: fuelTypeId,
            distance_traveled: distanceTraveled,
            distanceUnit: distanceUnit,

          },
          success: function (response) {
            $("#distance_traveled-results").html(response); // Display the results
          },
          error: function (jqXHR, textStatus, errorThrown) {
            console.log("AJAX error:", textStatus, errorThrown);
          }
        });
      } else {
        $("#distance_traveled-results").html("<p>Please select a country, fuel type, and enter a valid distance.rere</p>");
      }
    });
  });
</script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels"></script>
<script>
document.addEventListener("DOMContentLoaded", function () {
    document.querySelector("input[name='submitfirst']").addEventListener("click", calculateResults);
});

function calculateResults() {
    var reportSection = document.getElementById('report-graph-main-section');
     var reportSectionsemailsenderbox = document.getElementById('emailsenderboxData');
    reportSection.style.display = 'block'; 
    reportSectionsemailsenderbox.style.display = 'block'; 
    
    let electricityConsumption = parseFloat(document.getElementById("electricity_consumption")?.value) || 0;
    let domesticRefrigeration = parseFloat(document.getElementById("domesticrefrigeration")?.value) || 0;
    let industrialRefrigeration = parseFloat(document.getElementById("industrialrefrigerationprocesses")?.value) || 0;
    let waste = parseFloat(document.getElementById("Waste")?.value) || 0;
    let email = parseFloat(document.getElementById("calculator-email")?.value)  || 0;
    let cloudHosting = parseFloat(document.getElementById("cloudhosting")?.value) || 0;

    let totalDistance = 0;
    document.querySelectorAll("input[name='distance_traveled[]']").forEach(input => {
        totalDistance += parseFloat(input.value) || 0;
    });

    document.querySelectorAll("input[name='public_transport[]']").forEach(input => {
        totalDistance += parseFloat(input.value) || 0;
    });

    document.querySelectorAll("input[name='distance[]']").forEach(input => {
        totalDistance += parseFloat(input.value) || 0;
    });

    let electricityEmissionFactor = 0.5;  
    let travelEmissionFactor = 0.2;       

    let totalElectricityEmissions = electricityConsumption * electricityEmissionFactor;
    let totalTravelEmissions = totalDistance * travelEmissionFactor;
    let totalRefrigerationEmissions = domesticRefrigeration + industrialRefrigeration;
    let totalWasteEmissions = waste;
    let totalOnlineServiceEmissions = email + cloudHosting;

    let totalCO2Emissions = totalElectricityEmissions + totalTravelEmissions + totalRefrigerationEmissions + totalWasteEmissions + totalOnlineServiceEmissions;

    // Calculate NO₂ emissions as 20% of CO₂ emissions
    let totalNO2Emissions = totalCO2Emissions * 0.2;
    let totalEmissions = totalCO2Emissions + totalNO2Emissions;

    document.getElementById("data-results").innerHTML = `
        <h3>Total CO2 Emissions: ${totalCO2Emissions.toFixed(2)} kg</h3>
        <h3>Total NO2 Emissions: ${totalNO2Emissions.toFixed(2)} kg</h3>
    `;

   

    drawBarChart({
        "Electricity": totalElectricityEmissions,
        "Travel": totalTravelEmissions,
        "Refrigeration": totalRefrigerationEmissions,
        "Waste": totalWasteEmissions,
        "Online Services": totalOnlineServiceEmissions
    });

    drawDoughnutChart({
        "CO2": totalCO2Emissions,
        "NO2": totalNO2Emissions
    });
    
     updateTable([
        { category: "Electricity Consumption", input: electricityConsumption, co2: totalElectricityEmissions },
        { category: "Travel Distance", input: totalDistance, co2: totalTravelEmissions },
        { category: "Domestic Refrigeration", input: domesticRefrigeration, co2: domesticRefrigeration },
        { category: "Industrial Refrigeration", input: industrialRefrigeration, co2: industrialRefrigeration },
        { category: "Waste", input: waste, co2: totalWasteEmissions },
        { category: "Email", input: email, co2: email*50 },
        { category: "Cloud Hosting", input: cloudHosting, co2: cloudHosting },
        { category: "Total Emissions", input: "-", co2: totalCO2Emissions, no2: totalNO2Emissions }
    ]);
}

// Function to update the emissions table
function updateTable(data) {
    let tableContainer = document.getElementById("emissions-table-container");
    let tableHTML = `
        <table border="1" cellspacing="0" cellpadding="5">
            <thead>
                <tr>
                    <th>Category</th>
                    <th>Input Value</th>
                    <th>CO2 Emissions (kg)</th>
                    <th>NO2 Emissions (kg)</th>
                </tr>
            </thead>
            <tbody>
                ${data.map(item => `
                    <tr>
                        <td>${item.category}</td>
                        <td>${item.input}</td>
                        <td>${item.co2.toFixed(2)}</td>
                        <td>${(item.no2 || (item.co2 * 0.2)).toFixed(2)}</td>
                    </tr>
                `).join('')}
            </tbody>
        </table>
    `;
    tableContainer.innerHTML = tableHTML;
}

// Function to Draw Bar Chart
function drawBarChart(data) {
    let canvasContainer = document.getElementById("bar-chart-container");
    let canvas = document.getElementById("emissionsBarChart");
    if (!canvas) {
        canvas = document.createElement("canvas");
        canvas.id = "emissionsBarChart";
        // canvas.width = 100;
        // canvas.height = 200;
        canvasContainer.innerHTML = ""; 
        canvasContainer.appendChild(canvas);
    }

    let ctx = canvas.getContext("2d");

    if (window.myBarChart) {
        window.myBarChart.destroy();
    }
    /*
    window.myBarChart = new Chart(ctx, {
        type: "bar",
        data: {
            labels: Object.keys(data),
            datasets: [{
                label: "CO2 Emissions (kg)",
                data: Object.values(data),
                backgroundColor: ["#ff6384", "#36a2eb", "#4bc0c0", "#ffcd56", "#9966ff"],
                borderColor: "#000",
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
    */
    window.myBarChart = new Chart(ctx, {
      type: "bar",
      data: {
          labels: Object.keys(data),
          datasets: [{
              label: "CO2 Emissions (kg)",
              data: Object.values(data),
              backgroundColor: ["#f58f73", "#0a255c", "#edc651", "#a5cc76", "#569467"],
              borderColor: "#000",
              borderWidth: 1
          }]
      },
      options: {
          responsive: true,
          maintainAspectRatio: false, 
          layout: {
              padding: {
                  top: 30,  // Add extra space at the top
                  bottom: 20
              }
          },
          plugins: {
              legend: {
                  display: false
              },
              datalabels: {
                  anchor: "end",
                  align: "top",
                  clip: false,  // Prevent cutting off labels
                  color: "#000",
                  font: {
                      size: 16,
                      weight: "bold"
                  },
                  formatter: (value) => `${value.toFixed(1)} kg`
              }
          },
          scales: {
              y: {
                  beginAtZero: true,
                  title: {
                      display: true,
                      text: "CO2 Emissions (kg)",
                      font: {
                          size: 14,
                          weight: "bold"
                      }
                  },
                  suggestedMax: Math.max(...Object.values(data)) * 1.2, // Add some extra space
              },
              x: {
                  title: {
                      display: true,
                      text: "Categories",
                      font: {
                          size: 14,
                          weight: "bold"
                      }
                  }
              }
          }
      },
      plugins: [ChartDataLabels]
  });
}

// Function to Draw Doughnut Chart (CO2 vs NO2)
function drawDoughnutChart(data) {
    let canvasContainer = document.getElementById("doughnut-chart-container");
    let canvas = document.getElementById("emissionsDoughnutChart");

    if (!canvas) {
        canvas = document.createElement("canvas");
        canvas.id = "emissionsDoughnutChart";
        canvas.width = 300;
        canvas.height = 300;
        canvasContainer.innerHTML = "";
        canvasContainer.appendChild(canvas);
    }

    let ctx = canvas.getContext("2d");

    if (window.myDoughnutChart) {
        window.myDoughnutChart.destroy();
    }

    window.myDoughnutChart = new Chart(ctx, {
        type: "doughnut",
        data: {
            labels: Object.keys(data),
            datasets: [{
                data: Object.values(data),
                backgroundColor: ["#7a5e3f", "#71ae49"],
                borderWidth: 2,
                hoverOffset: 8,
                borderColor: "#000"
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            cutout: "45%",
            plugins: {
                legend: {
                    display: true,
                    position: 'top',
                },
                tooltip: {
                    enabled: true,
                },
                datalabels: {
                    color: "#fff", 
                    font: { weight: "bold", size: 14 },
                    formatter: (value, ctx) => {
                        let total = ctx.dataset.data.reduce((acc, val) => acc + val, 0);
                        let percentage = ((value / total) * 100).toFixed(1) + "%";
                        return percentage;
                    },
                    anchor: "center",
                    align: "center"
                }
            }
        },
        plugins: [ChartDataLabels] // Enables data labels
    });
}
</script>

<script>

document.querySelector(".clickGovernance").addEventListener("click", function() {
    // GovernancerestultDownloadPDF
      var GovernancerestultDownloadPDF = document.getElementById('GovernancerestultDownloadPDF');
        GovernancerestultDownloadPDF.style.display = 'block'; 
    let results = `<table border="1" cellpadding="10" cellspacing="0" style="border-collapse: collapse; width: 100%;">
        <thead>
            <tr>
                <th>Category</th>
                <th>Metric</th>
                <th>Value</th>
            </tr>
        </thead>
        <tbody>`;

    // Board Oversight
    let boardMeetings = parseInt(document.getElementById("boardMeetings").value) || 0;
    let executiveDirectors = parseInt(document.getElementById("executiveDirectors").value) || 0;
    let nonExecutiveDirectors = parseInt(document.getElementById("nonExecutiveDirectors").value) || 0;
    let nominatedDirectorsESG = parseInt(document.getElementById("nominatedDirectorsESG").value) || 0;
    let avgAbsence = parseInt(document.getElementById("avgAbsence").value) || 0;

    let totalDirectors = executiveDirectors + nonExecutiveDirectors;
    let attendanceRate = boardMeetings > 0 ? ((1 - (avgAbsence / boardMeetings)) * 100).toFixed(2) + "%" : "0%";
    let esgDirectorPercentage = totalDirectors > 0 ? ((nominatedDirectorsESG / totalDirectors) * 100).toFixed(2) + "%" : "0%";

    results += `
        <tr><td rowspan="3">Board Oversight</td><td>Total Directors</td><td>${totalDirectors}</td></tr>
        <tr><td>Attendance Rate</td><td>${attendanceRate}</td></tr>
        <tr><td>ESG Directors Percentage</td><td>${esgDirectorPercentage}</td></tr>`;

    // Public Disclosure
    let disclosureFields = ["humanRights", "indigenousPeoples", "corporateDisclosure", "whistleBlowerProtection",
                            "animalWelfare", "politicalEngagement", "corruptionPrevention", "corruptionIncidents"];
    let disclosureCount = disclosureFields.filter(id => document.getElementById(id).checked).length;
    let disclosureStatus = disclosureCount >= 8 ? "✅ Green" : disclosureCount >= 6 ? "🟠 Orange" : "❌ Red";

    results += `<tr><td>Public Disclosure</td><td>Status</td><td>${disclosureStatus}</td></tr>`;

    // Payment Compliance
    let totalPayments = parseInt(document.getElementById("totalPayments").value) || 0;
    let paymentsOnTime = parseInt(document.getElementById("paymentsOnTime").value) || 0;
    let complianceRate = totalPayments > 0 ? ((paymentsOnTime / totalPayments) * 100).toFixed(2) + "%" : "0%";
    let complianceStatus = complianceRate > 95 ? "✅ Green" : complianceRate >= 85 ? "🟠 Orange" : "❌ Red";


    results += `<tr><td>Payment Compliance</td><td>Status</td><td>${complianceStatus} (${complianceRate})</td></tr>`;

    // Employee Turnover
    let employeesLeft = parseInt(document.getElementById("employeesLeft").value) || 0;
    let avgEmployees = parseInt(document.getElementById("avgEmployees").value) || 1;
    let turnoverRate = ((employeesLeft / avgEmployees) * 100).toFixed(2) + "%";

    results += `<tr><td>Employee Turnover</td><td>Turnover Rate</td><td>${turnoverRate}</td></tr>`;

    results += `</tbody></table>`; // 🔴 Ensure this line is closed properly

    // Display results
    document.querySelector(".Governancerestult").innerHTML = results;
}); // 🔴 Ensure this closing bracket is present


</script>


<div class="report-graph-main-section" id="report-graph-main-section" style="Display:none;">
 <br><br><br>
  <div id="bar-chart-container">
      <canvas id="emissionsBarChart"></canvas>
  </div>
  <br><br><br><br><br><br><br>
  <div id="doughnut-chart-container">
      <canvas id="emissionsDoughnutChart"></canvas>
  </div><br><br><br><br><br><br><br>
  <div id="emissions-table-container"></div>
  <br><br><br>
</div>
<div class="emailsenderbox" id="emailsenderboxData" style="Display:none;">
     <input type="email" name="email" id="sendemail-GHGEmissions" placeholder="Enter Email"> <button type="button" id="submit-GHGEmissions">Send Results on Mail</button>
     
     <button id="DownloadPDFForGHGEMISSIOM">Download PDF</button>
</div>




<script>
    
    document.addEventListener("DOMContentLoaded", function () {
    // Function to add new Personal Transport row
    document.getElementById("addRowBtn").addEventListener("click", function () {
        let vehicleRows = document.getElementById("vehicleRows");
        let newRow = document.createElement("div");
        newRow.classList.add("form-row");

        newRow.innerHTML = `
            <div class="main-input-box">
                <div class="input-box">
                    <label for="vehicle_type">Select Vehicle Type and Year:</label>
                    <div class="public_tranpost_data_s"></div>
                    <select name="distance_unit[]" class="distance_unit">
                        <option value="miles">Miles</option>
                        <option value="km">KM </option>
                    </select>
                </div>

                <div class="input-box">
                    <label for="distance_traveled">Distance: 
                        <i class="fa fa-info-circle info-icon" data-tooltip="Total Travelled distance for selected item"></i>
                    </label>
                    <input type="number" name="distance_traveled[]" class="distance_traveled" placeholder="Enter Distance" min="0" step="1" required>
                </div>

                <div class="input-box">
                    <div class="distance_traveled-results"></div>
                    <div class="emission-results"></div>
                    <button type="button" class="remove-btn">Remove Row</button>
                </div>
            </div>
        `;

        vehicleRows.appendChild(newRow);
        addRemoveFunctionality();
    });

    // Function to add new Public Transport row
    window.addTransportRow = function () {
        let transportSection = document.getElementById("transportSection");
        let newRow = document.createElement("div");
        newRow.classList.add("transportRow");

        newRow.innerHTML = `
            <div class="input-box">
                <label for="vehicle_type">Select Vehicle Type and Year:</label>
                ${doShortcode("[public_transport]")}

                <select name="distance_unit[]" class="distance_unit">
                    <option value="miles">Miles</option>
                    <option value="km">KM </option>
                </select>
            </div>
            <div class="input-box">
                <label for="distance_traveled">Distance:  
                    <i class="fa fa-info-circle info-icon" data-tooltip="Total Travelled distance for selected item"></i>
                </label>
                <input type="number" name="public_transport[]" class="public_transport" placeholder="Enter Distance">
                <div class="public_transport-results"></div>
                <button type="button" class="remove-btn">Remove Row</button>
            </div>
        `;

        transportSection.appendChild(newRow);
        addRemoveFunctionality();
    };

    // Function to add new Freight Transport row
    window.addTransportRowFreight = function () {
        let transportSectionFreight = document.getElementById("transportSectionFreight");
        let newRow = document.createElement("div");
        newRow.classList.add("transportRowFreight");

        newRow.innerHTML = `
            <div class="input-box">
                <label for="vehicle_type">Select Vehicle Type and Year:</label>
                ${doShortcode("[transportSectionFreight]")}

                <select name="distance_unit[]" class="distance_unit">
                    <option value="miles">Miles</option>
                    <option value="km">KM </option>
                </select>
            </div>
            <div class="input-box">
                <label for="distance_traveled">Distance:  
                    <i class="fa fa-info-circle info-icon" data-tooltip="Total Travelled distance for selected item"></i>
                </label>
                <input type="number" name="distance[]" class="Freightdistance" placeholder="Enter Distance">
                <div class="freight-results"></div>
                <button type="button" class="remove-btn">Remove Row</button>
            </div>
        `;

        transportSectionFreight.appendChild(newRow);
        addRemoveFunctionality();
    };

    // Function to remove a row
    function addRemoveFunctionality() {
        let removeButtons = document.querySelectorAll(".remove-btn");
        removeButtons.forEach(btn => {
            btn.addEventListener("click", function () {
                this.closest(".form-row, .transportRow, .transportRowFreight").remove();
            });
        });
    }

    addRemoveFunctionality(); // Initialize for existing rows
});

</script>