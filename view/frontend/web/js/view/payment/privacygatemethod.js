define(
    [
        'uiComponent',
        'Magento_Checkout/js/model/payment/renderer-list'
    ],
    function (
        Component,
        rendererList
    ) {
        'use strict';
        rendererList.push(
            {
                type: 'privacygatemethod',
                component: 'PrivacyGate_PaymentGateway/js/view/payment/method-renderer/privacygatemethod-method'
            }
        );
        return Component.extend({});
    }
);