import { get as config } from '../app/config';

export interface IComponentContructor {
    new(): Component
}

export interface IComponentImporter {
    (): Promise<{ default: IComponentContructor }>
}

export default abstract class Component extends HTMLElement {
    readonly name: string
    readonly jsName: string

    constructor() {
        super();
        this.name = this.tagName.toLowerCase();
        this.jsName = `js-${this.name}`;

        document.addEventListener(config().events.ready, () => this.readyCallback(), {
            capture: false,
            once: true
        });
    }

    protected abstract readyCallback(): void

    protected dispatchCustomEvent(name: string, detail: any = {}): void {
        const customEvent = new CustomEvent(name, { detail });
        this.dispatchEvent(customEvent);
    }
}
