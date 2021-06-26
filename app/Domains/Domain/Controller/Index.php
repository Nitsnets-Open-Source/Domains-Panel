<?php declare(strict_types=1);

namespace App\Domains\Domain\Controller;

use Illuminate\Http\Response;
use App\Domains\Domain\Model\Domain as Model;

class Index extends ControllerAbstract
{
    /**
     * @return \Illuminate\Http\Response
     */
    public function __invoke(): Response
    {
        $this->filters();

        $this->meta('title', __('domain-index.meta-title'));

        return $this->page('domain.index', [
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
