declare const __COMPONENTTYPESCRIPTFILES__: any;

export default function getClosestParent(componentName: string): void {
    return __COMPONENTTYPESCRIPTFILES__[componentName][0];
}
