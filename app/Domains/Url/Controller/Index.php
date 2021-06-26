<?php declare(strict_types=1);

namespace App\Domains\Url\Controller;

use Illuminate\Http\Response;
use App\Domains\Url\Model\Url as Model;

class Index extends ControllerAbstract
{
    /**
     * @return \Illuminate\Http\Response
     */
    public function __invoke(): Response
    {
        $this->filters();

        $this->meta('title', __('url-index.meta-title'));

        return $this->page('url.index', [
            'list' => Model::list()->filter($this->request->input())->get(),
            'filters' => $this->request->input(),
        ]);
    }

    /**
     * @return void
     */
    protected function filters(): void
    {
        $this->request->merge([
            'error' => (bool)$this->request->input('error'),
        ]);
    }
}
