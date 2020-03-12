import getClosestParent from '../../../../default/app/getParentImport';
import Component from "ShopUi/models/component";
const togglerClickClass = import(`${getClosestParent('toggler-click')}`)
    .then(module => {
        return module;
    }).then(module => {
        return class TogglerClick extends module {
            protected readyCallback(): void {}

            protected init(): void {
                console.log('here');
            }
        };
    });

export default togglerClickClass;
