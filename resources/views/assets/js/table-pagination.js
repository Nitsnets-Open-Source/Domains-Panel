(function (cash) {
    'use strict';

    function paginate($paginator, $trs, $a, limit) {
        const page = parseInt($a.innerHTML);
        const first = (page - 1) * limit;
        const last = (page * limit) - 1;

        $trs.forEach(function (value, index) {
            const $tr = $trs[index];

            if ((index < first) || (index > last)) {
                $tr.style.display = 'none';
                $tr.dataset.tablePaginationHidden = 'true';
            } else {
                $tr.style.display = 'table-row';
                $tr.dataset.tablePaginationHidden = 'false';
            }
        });

        $paginator.querySelectorAll('a').forEach(each => each.classList.remove('pagination__link--active'));
        $a.classList.add('pagination__link--active');
    }

    cash('[data-table-pagination]').each(function () {
        const $paginator = document.getElementById(this.dataset.tablePagination);

        if (!$paginator) {
            return;
        }

        const $trs = this.querySelectorAll('tbody > tr');
        const limit = parseInt(this.dataset.tablePaginationLimit || 50);
        const total = $trs.length;

        if (total < limit) {
            return;
        }

        const pages = parseInt((total / limit) + (((total % limit) === 0) ? 0 : 1));

        $paginator.insertAdjacentHTML('beforeend', '<li><a href="javascript:;" class="pagination__link pagination__link--active">1</a></li>');

        for (let i = 1; i < pages; i++) {
            $paginator.insertAdjacentHTML('beforeend', '<li><a href="javascript:;" class="pagination__link">' + (i + 1) + '</a></li>');
        }

        paginate($paginator, $trs, $paginator.querySelector('a'), limit);

        $paginator.querySelectorAll('a').forEach(each => each.addEventListener('click', () => paginate($paginator, $trs, each, limit), false));
    });
})(cash);
