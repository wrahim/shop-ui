import Component from '../../../models/component';

export default class ProductItem extends Component {
    protected readyCallback(): void {}

    protected init(): void {
        console.log('Product item core default');
    }
}
