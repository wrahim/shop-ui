import SuggestSearchBase from 'ShopUi/components/molecules/suggest-search/suggest-search';
import OverlayBlock from '../../atoms/overlay-block/overlay-block';

export default class SuggestSearch extends SuggestSearchBase {
    protected overlay: OverlayBlock;

    protected readyCallback(): void {
        this.overlay = <OverlayBlock>document.querySelector(this.overlaySelector);

        super.readyCallback();
    }

    showSugestions(): void {
        super.showSugestions();

        this.searchInput.classList.add(`${this.name}__input--active`);
        this.hintInput.classList.add(`${this.name}__hint--active`);

        if (window.innerWidth >= this.overlayBreakpoint) {
            this.overlay.showOverlay('no-search', 'no-search');
        }
    }

    hideSugestions(): void {
        super.hideSugestions();

        this.searchInput.classList.remove(`${this.name}__input--active`);
        this.hintInput.classList.remove(`${this.name}__hint--active`);

        if (window.innerWidth >= this.overlayBreakpoint) {
            this.overlay.hideOverlay('no-search', 'no-search');
        }
    }

    get overlaySelector(): string {
        return '.js-overlay-block';
    }

    get overlayBreakpoint(): number {
        return Number(this.getAttribute('overlay-breakpoint'));
    }

}
