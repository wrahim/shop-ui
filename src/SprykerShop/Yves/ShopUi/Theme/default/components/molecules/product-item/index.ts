import './style';
import register from '../../../app/registry';
export default register('product-item', () => import(/* webpackMode: "lazy" */'./product-item'));
