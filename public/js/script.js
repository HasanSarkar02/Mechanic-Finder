document.addEventListener('DOMContentLoaded', function() {
    const roleSelect = document.getElementById('role');
    const offeredServicesField = document.getElementById('offered_services_field');
    const workingHoursField = document.getElementById('working_hours_field');

    function toggleFields() {
        if (roleSelect.value === 'mechanic') {
            offeredServicesField.classList.remove('hidden');
            workingHoursField.classList.remove('hidden');
        } else {
            offeredServicesField.classList.add('hidden');
            workingHoursField.classList.add('hidden');
        }
    }

    roleSelect.addEventListener('change', toggleFields);

    // Initially toggle fields based on the default selected role
    toggleFields();
});
