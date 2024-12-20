(function($) {
    'use strict';

    $(document).ready(function() {
        // Load saved state from localStorage
        $('.visibility-form').each(function() {
            const form = $(this);
            const savedState = localStorage.getItem('visibilityState');
            
            if (savedState) {
                const state = JSON.parse(savedState);
                form.find('input[type="checkbox"]').each(function() {
                    const selector = $(this).val();
                    $(this).prop('checked', state[selector] || false);
                    $(selector).toggle(state[selector] || false);
                });
            }
        });

        // Handle form submission
        $('.visibility-form').on('submit', function(e) {
            e.preventDefault();
            const form = $(this);
            const state = {};

            form.find('input[type="checkbox"]').each(function() {
                const checkbox = $(this);
                const selector = checkbox.val();
                const isChecked = checkbox.prop('checked');
                
                state[selector] = isChecked;
                $(selector).toggle(isChecked);
            });

            // Save state to localStorage
            localStorage.setItem('visibilityState', JSON.stringify(state));
        });
    });
})(jQuery); 