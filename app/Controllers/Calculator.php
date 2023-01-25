<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Libraries\Formulae;

class Calculator extends BaseController
{
    // public function index()
    // {
    //     //
    // }

    // public function show($slug)
    // {
    //     $data = [
    //         'pageMeta' => [
    //             'layout' => 'default',
    //         ],
    //     ];

    //     return view('calculators/' . $slug, $data);
    // }

    public function show($slug)
    {
        $data = [
            'pageMeta' => [
                'layout' => 'default',
            ],
            'result' => false
        ];


        switch ($slug) {
            case 'body-mass-index':

                break;

            case 'total-daily-energy-expenditure':
                if ($this->request->getGet('gender') && $this->request->getGet('age') && $this->request->getGet('weight') && $this->request->getGet('height') && $this->request->getGet('activity')) {

                    $data['result'] = [
                        // 'title' => 'Calculator',
                        // 'page' => 'calc',
                        'gender' => (string) $this->request->getGet('gender'),
                        'age' => (int) $this->request->getGet('age'),
                        'weight' => (int) $this->request->getGet('weight'),
                        'height' => (int) $this->request->getGet('height'),
                        'activity' => (float) $this->request->getGet('activity'),
                        'bodyfat' => ($this->request->getGet('bodyfat') != '') ? (int) $this->request->getGet('bodyfat') : false,
                        'bodyMassIndex' => Formulae::bodyMassIndex(
                            (int) $this->request->getGet('weight'),
                            (int) $this->request->getGet('height')
                        ),
                    ];

                    $data['result']['mifflinStJeorEquation'] = Formulae::mifflinStJeorEquation(
                        (int) $this->request->getGet('weight'),
                        (int) $this->request->getGet('height'),
                        (int) $this->request->getGet('age'),
                        (string) $this->request->getGet('gender')
                    );
                    $data['result']['mifflinStJeorEquationWeekly'] = $data['result']['mifflinStJeorEquation'] * 7;

                    $data['result']['katchMcArdleEquationByWeightAndHeight'] = Formulae::katchMcArdleEquation(
                        Formulae::leanBodyMassByWeightAndHeight(
                            (int) $this->request->getGet('weight'),
                            (int) $this->request->getGet('height'),
                            (string) $this->request->getGet('gender')
                        ),
                    );

                    if ($this->request->getGet('bodyfat') != '') {
                        $data['result']['katchMcArdleEquationByBodyFatPercentage'] = Formulae::katchMcArdleEquation(
                            Formulae::leanBodyMassByBodyFatPercentage(
                                (int) $this->request->getGet('weight'),
                                (int) $this->request->getGet('bodyfat')
                            ),
                        );
                    }

                    $data['result']['harrisBenedictEquation'] = Formulae::harrisBenedictEquation(
                        (int) $this->request->getGet('weight'),
                        (int) $this->request->getGet('height'),
                        (int) $this->request->getGet('age'),
                        (string) $this->request->getGet('gender')
                    );
                } else {
                    //
                }


                break;

            default:
                # code...
                break;
        }

        return view('calculators/' . $slug, $data);
    }
}
