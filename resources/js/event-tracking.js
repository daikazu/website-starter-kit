// Utility to attach Fathom event listeners
function attachFathomEventListeners(eventMap) {
    for (const [eventName, trackData] of Object.entries(eventMap)) {
        window.addEventListener(eventName, (event) => {
            const { action, additionalData = [] } = trackData;
            window.fathom.trackEvent(action, ...additionalData.map((key) => event.detail?.[key]));
        });
    }
}

// Mapping of event names to Fathom actions and optional data keys
const eventMap = {
    'contact-us-success': { action: 'Contact Request' },
    'quote-request-success': { action: 'Quote Request' },
    'form-submitted': { action: 'Quote Request' },
    'checkout-success': { action: 'Checkout Success', additionalData: ['total'] },
    'newsletter-signup-success': { action: 'Newsletter Signup' },
};

// Attach the event listeners
attachFathomEventListeners(eventMap);

// Required if you are using wire:navigate
document.addEventListener('livewire:navigated', function () {
    if (window.fathom) {
        window.fathom.trackPageview();
    }
});
