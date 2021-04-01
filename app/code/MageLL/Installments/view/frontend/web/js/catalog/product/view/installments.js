define(
    [
        'jquery',
        'uiComponent',
        'ko',
        'mage/translate',
        'Magento_Catalog/js/price-utils',
        'Magento_Catalog/js/price-box'
    ],


    function ($, Component, ko, $t, priceUtils, priceBox) {
        'use strict';
        return Component.extend({
            defaults: {
                template: 'MageLL_Installments/catalog/product/view/installments'
            },

            productPrice: window.installments.priceConfig.prices.finalPrice.amount,
            installmentText: ko.observable(''),

            initialize: function () {
                this._super();


                this.installmentText(
                    $t('Or %1 of %2')
                        .replace('%1', this.getInstallmentQty)
                        .replace('%2', this.getInstallmentAmount(0))
                )

                $('body').on('updatePrice', (_e, data) => {
                    this.installmentText(
                        $t('Or %1 of %2')
                            .replace('%1', this.installmentQty)
                            .replace('%2', this.getInstallmentAmount(data.prices.finalPrice.amount))
                    )
                });
            },

            getInstallmentAmount: function (increase) {
                const installmentAmount = (this.productPrice + increase) / this.installmentQty;
                return priceUtils.formatPrice(installmentAmount, undefined, undefined);
            },

            getInstallmentQty: function () {
                const maxInstallment = window.installments.installmentConfig.max_installment

                for(let i = maxInstallment; i >= window.installments.installmentConfig.min_amount; i-- ) {
                    
                }
            },
        });
    }
);
