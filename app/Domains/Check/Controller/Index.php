<?php declare(strict_types=1);

namespace App\Domains\Check\Controller;

use Illuminate\Http\Response;
use App\Domains\Check\Model\Check as Model;

class Index extends ControllerAbstract
{
    /**
     * @return \Illuminate\Http\Response
     */
    public function __invoke(): Response
    {
        $this->filters();

        $this->meta('title', __('check-index.meta-title'));

        return $this->page('check.index', [
            'list' => Model::list()->filter($this->request->input())->paginate(50),
            'filters' => $this->request->input(),
        ]);
    }

    /**
     * @return void
     */
    protected function filters(): void
    {
        $this->request->merge([
            'search' => (string)$this->request->input('search'),
            'start_at' => (string)$this->request->input('start_at'),
            'end_at' => (string)$this->request->input('end_at'),
            'error' => (bool)$this->request->input('error'),
            'type' => $this->request->input('type', ''),
        ]);
    }
}
