document.addEventListener('DOMContentLoaded', function () {
  // Switch main tabs
  const tabs = document.querySelectorAll('.tab');
  const steps = document.querySelectorAll('.step');
  
  tabs.forEach(tab => {
    tab.addEventListener('click', function () {
      const stepNumber = tab.getAttribute('data-step');
      showStep(stepNumber);
    });
  });

  // Switch subtabs within each step
  const subtabs = document.querySelectorAll('.subtab');
  subtabs.forEach(subtab => {
    subtab.addEventListener('click', function () {
      const substepNumber = subtab.getAttribute('data-substep');
      showSubstep(substepNumber);
    });
  });

  // Show a specific step
  function showStep(stepNumber) {
    steps.forEach(step => {
      if (step.getAttribute('data-step') === stepNumber) {
        step.classList.add('active');
      } else {
        step.classList.remove('active');
      }
    });

    tabs.forEach(tab => {
      if (tab.getAttribute('data-step') === stepNumber) {
        tab.classList.add('active');
      } else {
        tab.classList.remove('active');
      }
    });
  }

  // Show a specific substep
  function showSubstep(substepNumber) {
    const allSubsteps = document.querySelectorAll('.substep');
    allSubsteps.forEach(substep => {
      if (substep.getAttribute('data-substep') === substepNumber) {
        substep.classList.add('active');
      } else {
        substep.classList.remove('active');
      }
    });

    const allSubtabs = document.querySelectorAll('.subtab');
    allSubtabs.forEach(subtab => {
      if (subtab.getAttribute('data-substep') === substepNumber) {
        subtab.classList.add('active');
      } else {
        subtab.classList.remove('active');
      }
    });
  }

  // Initial step and substep setup
  showStep('1');
  showSubstep('1');
  
  // Navigation buttons
  const nextButtons = document.querySelectorAll('.next');
  const prevButtons = document.querySelectorAll('.prev');

  nextButtons.forEach(button => {
    button.addEventListener('click', function () {
      const currentStep = button.closest('.step');
      const nextStep = parseInt(currentStep.getAttribute('data-step')) + 1;
      showStep(nextStep.toString());
      showSubstep(`${nextStep}-1`);
    });
  });

  prevButtons.forEach(button => {
    button.addEventListener('click', function () {
      const currentStep = button.closest('.step');
      const prevStep = parseInt(currentStep.getAttribute('data-step')) - 1;
      showStep(prevStep.toString());
      showSubstep(`${prevStep}-1`);
    });
  });
});



// const dropdown = document.getElementById('reporting_period');
// const currentYear = new Date().getFullYear();

// for (let year = 1970; year <= currentYear; year++) {
//   const option = document.createElement('option');
//   option.value = year;
//   option.textContent = year;
//   dropdown.appendChild(option);
// }




// //


   // Function to add new vehicle row dynamically
/*    document.getElementById('addRowBtn').addEventListener('click', function() {
    const vehicleRows = document.getElementById('vehicleRows');
    const newRow = document.createElement('div');
    newRow.classList.add('form-row');
    
    newRow.innerHTML = `
      <label for="vehicle_type">Select Vehicle Type and Year:</label>
      <select name="vehicle_type[]" required>
        <option value="" disabled selected>Select a vehicle</option>
          <option value="Bus-CNG">Bus - CNG</option>
          <option value="Bus-Ethanol">Bus - Ethanol</option>
          <option value="Bus-Diesel">Bus - Diesel</option>
          <option value="Bus-Gasoline">Bus - Gasoline</option>
          <option value="PassengerCar-Gasoline-1984-1993">Passenger Car - Gasoline - Year 1984-1993</option>
          <option value="PassengerCar-Gasoline-1994">Passenger Car - Gasoline - Year 1994</option>
          <option value="PassengerCar-Gasoline-1995">Passenger Car - Gasoline - Year 1995</option>
          <option value="PassengerCar-Gasoline-1996">Passenger Car - Gasoline - Year 1996</option>
          <option value="PassengerCar-Gasoline-1997">Passenger Car - Gasoline - Year 1997</option>
          <option value="PassengerCar-Gasoline-1998">Passenger Car - Gasoline - Year 1998</option>
          <option value="PassengerCar-Gasoline-1999">Passenger Car - Gasoline - Year 1999</option>
          <option value="PassengerCar-Gasoline-2000">Passenger Car - Gasoline - Year 2000</option>
          <option value="PassengerCar-Gasoline-2001">Passenger Car - Gasoline - Year 2001</option>
          <option value="PassengerCar-Gasoline-2002">Passenger Car - Gasoline - Year 2002</option>
          <option value="PassengerCar-Gasoline-2003">Passenger Car - Gasoline - Year 2003</option>
          <option value="PassengerCar-Gasoline-2004">Passenger Car - Gasoline - Year 2004</option>
          <option value="PassengerCar-Gasoline-2005-present">Passenger Car - Gasoline - Year 2005-present</option>
          <option value="PassengerCar-Diesel-1960-1982">Passenger Car - Diesel - Year 1960-1982</option>
          <option value="PassengerCar-Diesel-1983-present">Passenger Car - Diesel - Year 1983-present</option>
          <option value="PassengerCar-FuelUnknown">Passenger Car - Fuel Unknown</option>
          <option value="LightGoodsVehicle-CNG">Light Goods Vehicle - CNG</option>
          <option value="LightGoodsVehicle-LPG">Light Goods Vehicle - LPG</option>
          <option value="LightGoodsVehicle-Ethanol">Light Goods Vehicle - Ethanol</option>
          <option value="LightGoodsVehicle-Gasoline-1987-1993">Light Goods Vehicle - Gasoline - Year 1987-1993</option>
          <option value="LightGoodsVehicle-Gasoline-1994">Light Goods Vehicle - Gasoline - Year 1994</option>
          <option value="LightGoodsVehicle-Gasoline-1995">Light Goods Vehicle - Gasoline - Year 1995</option>
          <option value="LightGoodsVehicle-Gasoline-1996">Light Goods Vehicle - Gasoline - Year 1996</option>
          <option value="LightGoodsVehicle-Gasoline-1997">Light Goods Vehicle - Gasoline - Year 1997</option>
          <option value="LightGoodsVehicle-Gasoline-1998">Light Goods Vehicle - Gasoline - Year 1998</option>
          <option value="LightGoodsVehicle-Gasoline-1999">Light Goods Vehicle - Gasoline - Year 1999</option>
          <option value="LightGoodsVehicle-Gasoline-2000">Light Goods Vehicle - Gasoline - Year 2000</option>
          <option value="LightGoodsVehicle-Gasoline-2001">Light Goods Vehicle - Gasoline - Year 2001</option>
          <option value="LightGoodsVehicle-Gasoline-2002">Light Goods Vehicle - Gasoline - Year 2002</option>
          <option value="LightGoodsVehicle-Gasoline-2003">Light Goods Vehicle - Gasoline - Year 2003</option>
          <option value="LightGoodsVehicle-Gasoline-2004">Light Goods Vehicle - Gasoline - Year 2004</option>
          <option value="LightGoodsVehicle-Gasoline-2005-present">Light Goods Vehicle - Gasoline - Year 2005-present</option>
          <option value="LightGoodsVehicle-Diesel-1960-1982">Light Goods Vehicle - Diesel - Year 1960-1982</option>
          <option value="LightGoodsVehicle-Diesel-1983-1995">Light Goods Vehicle - Diesel - Year 1983-1995</option>
          <option value="LightGoodsVehicle-Diesel-1996-present">Light Goods Vehicle - Diesel - Year 1996-present</option>
          <option value="LightGoodsVehicle-FuelUnknown">Light Goods Vehicle - Fuel Unknown</option>
          <option value="HeavyDutyVehicle-Rigid-Gasoline-1985-1986">Heavy Duty Vehicle - Rigid - Gasoline - Year 1985-1986</option>
          <option value="HeavyDutyVehicle-Rigid-Gasoline-1987">Heavy Duty Vehicle - Rigid - Gasoline - Year 1987</option>
          <option value="HeavyDutyVehicle-Rigid-Gasoline-1988-1989">Heavy Duty Vehicle - Rigid - Gasoline - Year 1988-1989</option>
          <option value="HeavyDutyVehicle-Rigid-Gasoline-1990-1995">Heavy Duty Vehicle - Rigid - Gasoline - Year 1990-1995</option>
          <option value="HeavyDutyVehicle-Rigid-Gasoline-1996">Heavy Duty Vehicle - Rigid - Gasoline - Year 1996</option>
          <option value="HeavyDutyVehicle-Rigid-Gasoline-1997">Heavy Duty Vehicle - Rigid - Gasoline - Year 1997</option>
          <option value="HeavyDutyVehicle-Rigid-Gasoline-1998">Heavy Duty Vehicle - Rigid - Gasoline - Year 1998</option>
          <option value="HeavyDutyVehicle-Rigid-Gasoline-1999">Heavy Duty Vehicle - Rigid - Gasoline - Year 1999</option>
          <option value="HeavyDutyVehicle-Rigid-Gasoline-2000">Heavy Duty Vehicle - Rigid - Gasoline - Year 2000</option>
          <option value="HeavyDutyVehicle-Rigid-Gasoline-2001">Heavy Duty Vehicle - Rigid - Gasoline - Year 2001</option>
          <option value="HeavyDutyVehicle-Rigid-Gasoline-2002">Heavy Duty Vehicle - Rigid - Gasoline - Year 2002</option>
          <option value="HeavyDutyVehicle-Rigid-Gasoline-2003">Heavy Duty Vehicle - Rigid - Gasoline - Year 2003</option>
          <option value="HeavyDutyVehicle-Rigid-Gasoline-2004">Heavy Duty Vehicle - Rigid - Gasoline - Year 2004</option>
          <option value="HeavyDutyVehicle-Rigid-Gasoline-2005-present">Heavy Duty Vehicle - Rigid - Gasoline - Year 2005-present</option>
          <option value="HeavyDutyVehicle-Rigid-Diesel-1960-present">Heavy Duty Vehicle - Rigid - Diesel - Year 1960-present</option>
          <option value="HeavyDutyVehicle-Rigid-CNG">Heavy Duty Vehicle - Rigid - CNG</option>
          <option value="HeavyDutyVehicle-Rigid-LNG">Heavy Duty Vehicle - Rigid - LNG</option>
          <option value="HeavyDutyVehicle-Rigid-LPG">Heavy Duty Vehicle - Rigid - LPG</option>
          <option value="HeavyDutyVehicle-Rigid-Ethanol">Heavy Duty Vehicle - Rigid - Ethanol</option>
          <option value="HeavyDutyVehicle-Rigid-FuelUnknown">Heavy Duty Vehicle - Rigid - Fuel Unknown</option>
          <option value="HeavyDutyVehicle-Articulated-Gasoline-1985-1986">Heavy Duty Vehicle - Articulated - Gasoline - Year 1985-1986</option>
          <option value="HeavyDutyVehicle-Articulated-Gasoline-1987">Heavy Duty Vehicle - Articulated - Gasoline - Year 1987</option>
          <option value="HeavyDutyVehicle-Articulated-Gasoline-1988-1989">Heavy Duty Vehicle - Articulated - Gasoline - Year 1988-1989</option>
          <option value="HeavyDutyVehicle-Articulated-Gasoline-1990-1995">Heavy Duty Vehicle - Articulated - Gasoline - Year 1990-1995</option>
          <option value="HeavyDutyVehicle-Articulated-Gasoline-1996">Heavy Duty Vehicle - Articulated - Gasoline - Year 1996</option>
          <option value="HeavyDutyVehicle-Articulated-Gasoline-1997">Heavy Duty Vehicle - Articulated - Gasoline - Year 1997</option>
          <option value="HeavyDutyVehicle-Articulated-Gasoline-1998">Heavy Duty Vehicle - Articulated - Gasoline - Year 1998</option>
          <option value="HeavyDutyVehicle-Articulated-Gasoline-1999">Heavy Duty Vehicle - Articulated - Gasoline - Year 1999</option>
          <option value="HeavyDutyVehicle-Articulated-Gasoline-2000">Heavy Duty Vehicle - Articulated - Gasoline - Year 2000</option>
          <option value="HeavyDutyVehicle-Articulated-Gasoline-2001">Heavy Duty Vehicle - Articulated - Gasoline - Year 2001</option>
          <option value="HeavyDutyVehicle-Articulated-Gasoline-2002">Heavy Duty Vehicle - Articulated - Gasoline - Year 2002</option>
          <option value="HeavyDutyVehicle-Articulated-Gasoline-2003">Heavy Duty Vehicle - Articulated - Gasoline - Year 2003</option>
          <option value="HeavyDutyVehicle-Articulated-Gasoline-2004">Heavy Duty Vehicle - Articulated - Gasoline - Year 2004</option>
          <option value="HeavyDutyVehicle-Articulated-Gasoline-2005-present">Heavy Duty Vehicle - Articulated - Gasoline - Year 2005-present</option>
          <option value="HeavyDutyVehicle-Articulated-Diesel-1960-present">Heavy Duty Vehicle - Articulated - Diesel - Year 1960-present</option>
          <option value="HeavyDutyVehicle-Articulated-CNG">Heavy Duty Vehicle - Articulated - CNG</option>
          <option value="HeavyDutyVehicle-Articulated-LNG">Heavy Duty Vehicle - Articulated - LNG</option>
          <option value="HeavyDutyVehicle-Articulated-LPG">Heavy Duty Vehicle - Articulated - LPG</option>
          <option value="HeavyDutyVehicle-Articulated-Ethanol">Heavy Duty Vehicle - Articulated - Ethanol</option>
          <option value="HeavyDutyVehicle-Articulated-FuelUnknown">Heavy Duty Vehicle - Articulated - Fuel Unknown</option>
          <option value="Motorbike-NonCatalystControl">Motorbike - Non-Catalyst Control</option>
          <option value="Motorbike-Uncontrolled">Motorbike - Uncontrolled</option>
          <option value="Motorbike-ControlUnknown">Motorbike - Control Unknown</option>
      </select>
      <br><br>
      <label for="distance_traveled">Distance Traveled Annually:</label>
      <input type="number" name="distance_traveled[]" placeholder="Enter distance" min="0" step="1" required>
      <select name="distance_unit[]">
        <option value="miles">Miles</option>
        <option value="km">KM (UK only)</option>
      </select>
      <br><br>
      <button type="button" class="remove-btn" onclick="removeRow(this)">Remove Row</button>
    `;
    vehicleRows.appendChild(newRow);
  }); */

  // Function to remove vehicle row
  function removeRow(button) {
    const row = button.closest('.form-row');
    row.remove();
  }






  function addTransportRow() {
    // Clone the first transport row
    const newRow = document.querySelector('.transportRow').cloneNode(true);

    // Clear the input field in the cloned row
    newRow.querySelector('input').value = '';

    // Append the cloned row to the transport section
    document.getElementById('transportSection').appendChild(newRow);
}


function addTransportRowFreight() {
  // Clone the first transport row
  const newRow = document.querySelector('.transportRowFreight').cloneNode(true);

  // Clear the input field in the cloned row
  newRow.querySelector('input').value = '';

  // Append the cloned row to the transport section
  document.getElementById('transportSectionFreight').appendChild(newRow);
}


$("#electricity_consumption").on("input", function() {
  var consumptionValue = parseFloat($(this).val()); // Get the entered value
  if (!isNaN(consumptionValue) && consumptionValue > 0) {
      // Loop through each row in the table
      $("#data-results table tr").each(function() {
          var $row = $(this);
          var originalValue = parseFloat($row.find("td:nth-child(2)").text()); // Get the original value from the 3rd column (Value)
         
          if (!isNaN(originalValue)) {
              var newValue = originalValue * consumptionValue; // Multiply by the entered value
              $row.find("td:nth-child(2)").text(newValue+ ' / LB'); // Update the Value column
           //   $row.find("td:nth-child(2)").text('LB'); // Update the Value column
          }
      });
  } else {
      // If the input is invalid, reset the table to the original values
      $("#reporting-period").change(); // Re-fetch the original data
  }
});


$("#reset-button").click(function() {
  $("#electricity_consumption").val(""); // Clear the input field
  $("#reporting-period").change(); // Re-fetch the original data
});