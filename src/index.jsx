import domReady from '@wordpress/dom-ready';
import { createRoot } from '@wordpress/element';
import App from './app';

const SettingsPage = () => {
    return (
        <App />
    );
};

domReady(() => {
    const element = document.getElementById('wp-react-form');
    if (element) {
        const root = createRoot(element);
        root.render(<SettingsPage />);
    } else {
        console.error('Element with ID "wp-react-form" not found.');
    }
});
