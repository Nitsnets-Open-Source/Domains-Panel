(function (cash) {
    'use strict';

    cash('[data-change-submit]').on('change', function (e) {
        const form = this.closest('form');

        if (!form) {
            return;
        }

        e.preventDefault();

        form.submit();
    });

    cash('[data-click-one]').on('click', function (e) {
        const form = this.closest('form');

        if (!form) {
            return;
        }

        e.preventDefault();

        this.disabled = true;

        const input = document.createElement('input');

        input.type = 'hidden';
        input.name = this.name;
        input.value = this.value;

        form.appendChild(input);
        form.submit();
    });

    cash('[data-link-boolean]').on('click', function (e) {
        e.preventDefault();

        const link = this;

        ajax(link.href, function(response) {
            const value = response[link.dataset.linkBoolean];

            link.innerHTML = '<span class="' + (value ? 'text-theme-10' : 'text-theme-24') + '">'
                + '<svg class="feather w-4 h-4 mr-2"><use xlink:href="' + WWW + '/build/images/feather-sprite.svg#' + (value ? 'check-square' : 'square') + '" /></svg>'
                + '</span>';
        });
    });
})(cash);

(function (cash) {
    'use strict';

    function dataValueToPercent ($this) {
        byIdOptional($this.dataset.valueToPercent).value = percentRound(float($this.value), float(byIdOptional($this.dataset.valueToPercentReference).value));
    }

    function dataPercentToValue ($this) {
        const operation = ($this.dataset.percentToValueOperation === 'substract') ? 'substract' : 'add';

        const first = float(byIdOptional($this.dataset.percentToValueReference).value);
        const second = first * parseFloat(float($this.value)) / 100;

        byIdOptional($this.dataset.percentToValue).value = round((operation === 'add') ? (first + second) : (first - second));
    }

    function dataTotal ($this) {
        ($this.dataset.totalTarget ? byIdOptional($this.dataset.totalTarget) : $this).value = round(float(byIdOptional($this.dataset.totalAmount).value) * float(byIdOptional($this.dataset.totalValue).value));
    }

    cash('[data-value-to-percent]').on('change keyup', function () {
        dataValueToPercent(this);
    });

    cash('[data-percent-to-value]').on('change keyup', function () {
        dataPercentToValue(this);
    });

    cash('[data-total]').each(function () {
        const $this = this,
            changes = ($this.dataset.totalChange || '').split(',');

        changes.push(this.dataset.totalAmount);
        changes.push(this.dataset.totalValue);

        changes.forEach((each) => byIdCash(each).on('change keyup', () => dataTotal($this)));
    });
})(cash);
