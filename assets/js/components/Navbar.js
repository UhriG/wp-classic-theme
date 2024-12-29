/**
 * Navbar functionality
 */
export default class Navbar {
    /**
     * Initialize navbar
     * @constructor
     */
    constructor() {
        this.button = document.getElementById('mobile-menu-button');
        this.menu = document.getElementById('mobile-menu');
        this.isOpen = false;

        if (this.button && this.menu) {
            this.init();
        }
    }

    /**
     * Initialize event listeners
     */
    init() {
        this.button.addEventListener('click', () => this.toggleMenu());
        // Close menu when clicking outside
        document.addEventListener('click', (e) => {
            if (!this.button.contains(e.target) && !this.menu.contains(e.target) && this.isOpen) {
                this.toggleMenu();
            }
        });
    }

    /**
     * Toggle mobile menu state
     */
    toggleMenu() {
        this.isOpen = !this.isOpen;
        this.menu.classList.toggle('is-active');
        this.button.setAttribute('aria-expanded', this.isOpen);
        
        // Update button icon state (optional)
        this.button.classList.toggle('is-active');
    }
}
