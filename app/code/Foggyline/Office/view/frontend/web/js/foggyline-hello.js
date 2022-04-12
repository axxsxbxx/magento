define([
    "jquery",
    "jquery/ui"
], function($){
    "use strict";
    $.widget('mage.foggylineHello', {
        options: {
        },
        _create: function () {
            alert(this.options);

        }
    });

    return $.mage.foggylineHello;
});