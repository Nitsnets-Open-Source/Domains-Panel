<?php declare(strict_types=1);

namespace App\Domains\Subdomain\Controller;

use Illuminate\Http\Response;
use App\Domains\Subdomain\Model\Subdomain as Model;

class Index extends ControllerAbstract
{
    /**
     * @return \Illuminate\Http\Response
     */
    public function __invoke(): Response
    {
        $this->filters();

        $this->meta('title', __('subdomain-index.meta-title'));

        return $this->page('subdomain.index', [
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
            'type' => $this->request->input('type', ''),
        ]);
    }
}
