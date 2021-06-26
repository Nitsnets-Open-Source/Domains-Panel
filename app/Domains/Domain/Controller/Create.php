<?php declare(strict_types=1);

namespace App\Domains\Domain\Controller;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;

class Create extends ControllerAbstract
{
    /**
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function __invoke(): Response|RedirectResponse
    {
        if ($response = $this->actionPost('create')) {
            return $response;
        }

        $this->meta('title', __('domain-create.meta-title'));

        return $this->page('domain.create');
    }

    /**
     * @return \Illuminate\Http\RedirectResponse
     */
    protected function create(): RedirectResponse
    {
        $this->row = $this->action()->create();

        $this->sessionMessage('success', __('domain-create.success'));

        return redirect()->route('domain.update.data', $this->row->id);
    }
}
