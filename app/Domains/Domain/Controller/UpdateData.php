<?php declare(strict_types=1);

namespace App\Domains\Domain\Controller;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;

class UpdateData extends ControllerAbstract
{
    /**
     * @param int $id
     *
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function __invoke(int $id): Response|RedirectResponse
    {
        $this->row($id);

        if ($response = $this->actionPost('update')) {
            return $response;
        }

        $this->meta('title', $this->row->host);

        $this->request->merge($this->request->input() + $this->row->toArray());

        return $this->page('domain.update-data', [
            'row' => $this->row,
        ]);
    }

    /**
     * @return \Illuminate\Http\RedirectResponse
     */
    protected function update(): RedirectResponse
    {
        $this->action()->update();

        $this->sessionMessage('success', __('domain-update.success'));

        return redirect()->route('domain.update.data', $this->row->id);
    }
}
