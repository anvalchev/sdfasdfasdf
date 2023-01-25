<?= $this->extend('cms/layouts/' . $pageMeta['layout']) ?>

<?= $this->section('content') ?>

<div class="container">
    <div class="row">
        <div class="col">
            <h1>Total Daily Energy Expenditure Calculator (TDEE)</h1>
            <p class="lead">Unlock your body's energy potential with our TDEE Calculator! But wait, <a href="<?= base_url('glossary/total-daily-energy-expenditure') ?>">what is Total Daily Energy Expenditure Calculator (TDEE)</a> actually?</p>
        </div>
    </div>
    <div class="row mb-5">
        <div class="col-12 <?= ($result) ? "col-md-5 col-lg-3" : "col-md-5 offset-md-1" ?> mb-5">

            <div class="card">
                <div class="card-body">


                    <form class="form-floating needs-validation" method="get" action="<?= base_url('calculator/total-daily-energy-expenditure') ?>" novalidate>

                        <div class="form-floating mb-3">
                            <select name="gender" class="form-select" id="gender-metric" aria-label="Default select example" required>
                                <option <?= isset($result['activity']) ?: 'selected' ?> disabled></option>
                                <option value="male" <?= (isset($result['gender']) && $result['gender'] == 'male') ? 'selected' : '' ?>>Male</option>
                                <option value="female" <?= (isset($result['activity']) && $result['activity'] == '1.9') ? 'selected' : '' ?>>Female</option>
                            </select>
                            <label for="gender-metric" class="form-label">Gender <sup class="text-warning">(required)</sup></label>
                            <div class="invalid-feedback">
                                Equations used are gender specific.
                            </div>
                        </div>

                        <div class="form-floating mb-3">
                            <input name="age" type="number" class="form-control" id="age-metric" placeholder="2 - 120" <?= !isset($result['age']) ?: 'value="' . $result['age'] . '"' ?> min="2" max="120" step="1" required>
                            <label for="age-metric" class="form-label">Age <sup class="text-warning">(required)</sup></label>
                            <div class="invalid-feedback">
                                Equations used are designed for an age range from 2 to 120 years of age.
                            </div>
                        </div>

                        <div class="form-floating mb-3">
                            <input name="weight" type="number" class="form-control" id="weight-metric" placeholder="kg" <?= !isset($result['weight']) ?: 'value="' . $result['weight'] . '"' ?> min="10" max="600" step="1" required>
                            <label for="weight-metric" class="form-label">Weight in kilograms <sup class="text-warning">(required)</sup></label>
                            <div class="invalid-feedback">
                                Equations used are designed for a weight range from 10 to 600 kilograms.
                            </div>
                        </div>

                        <div class="form-floating mb-3">
                            <input name="height" type="number" class="form-control" id="height-metric" placeholder="cm" <?= !isset($result['height']) ?: 'value="' . $result['height'] . '"' ?> min="80" max="251" required>
                            <label for="height-metric" class="form-label">Height in centimeters <sup class="text-warning">(required)</sup></label>
                            <div class="invalid-feedback">
                                Equations used are designed for a height range from 80 to 251 centimeters.
                            </div>
                        </div>

                        <div class="form-floating mb-3">
                            <select name="activity" class="form-select" id="activity-metric" aria-label="Default select example" required>
                                <option <?= isset($result['activity']) ?: 'selected' ?> disabled></option>
                                <option value="1.2" <?= (isset($result['activity']) && $result['activity'] == '1.2') ? 'selected' : '' ?>>Sedentary (office job)</option>
                                <option value="1.375" <?= (isset($result['activity']) && $result['activity'] == '1.375') ? 'selected' : '' ?>>Light Exercise (1-2 days/week)</option>
                                <option value="1.55" <?= (isset($result['activity']) && $result['activity'] == '1.55') ? 'selected' : '' ?>>Moderate Exercise (3-5 days/week)</option>
                                <option value="1.725" <?= (isset($result['activity']) && $result['activity'] == '1.725') ? 'selected' : '' ?>>Heavy Exercise (6-7 days/week)</option>
                                <option value="1.9" <?= (isset($result['activity']) && $result['activity'] == '1.9') ? 'selected' : '' ?>>Athlete (2x per day) </option>
                            </select>
                            <label for="activity-metric" class="form-label">Activity level <sup class="text-warning">(required)</sup></label>
                            <div class="invalid-feedback">
                                Activity level is used to calculate your estimated daily calorie needs and adjust the equations used.
                            </div>
                        </div>

                        <div class="form-floating mb-3">
                            <input name="bodyfat" type="number" class="form-control" id="bodyfat-metric" placeholder="%" <?= !isset($result['bodyfat']) ?: 'value="' . $result['bodyfat'] . '"' ?> min="1" max="59" step="1">
                            <label for="bodyfat-metric" class="form-label">Body Fat % <sup class="text-info">(optional)</sup></label>
                            <div class="invalid-feedback">
                                Body Fat % is used to calculate your estimated daily calorie needs and adjust the equations used. It can be in the range betweek 1 and 59 %. If you do not know your body fat %, leave this field blank and it will be automatically calculated.
                            </div>
                        </div>

                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-outline-primary btn-lg" id="submit-metric">Calculate!</button>
                        </div>

                    </form>

                    <script>
                        // Example starter JavaScript for disabling form submissions if there are invalid fields
                        (() => {
                            'use strict'

                            // Fetch all the forms we want to apply custom Bootstrap validation styles to
                            const forms = document.querySelectorAll('.needs-validation')

                            // Loop over them and prevent submission
                            Array.from(forms).forEach(form => {
                                form.addEventListener('submit', event => {
                                    if (!form.checkValidity()) {
                                        event.preventDefault()
                                        event.stopPropagation()
                                    }

                                    form.classList.add('was-validated')
                                }, false)
                            })
                        })()
                    </script>


                </div>
            </div>

        </div>
        <?php if ($result) : ?>
            <div class="col-12 col-md-7 col-lg-9">

                <div class="alert alert-primary text-center" role="alert">
                    <small>Best result based on your input:</small><br>

                    <?php if ($result['bodyfat']) : ?>
                        <big><strong class="h1"><?= round($result['katchMcArdleEquationByBodyFatPercentage'] * $result['activity']) ?></strong></big><br>kcal per day<br>
                        <small>based on <strong>Katch-McArdle Equation By Body Fat Percentage</strong></small>
                    <?php else : ?>
                        <big><strong class="h1"><?= round($result['mifflinStJeorEquation'] * $result['activity']) ?></strong></big><br>kcal per day<br>
                        <small>based on <strong>Mifflin-St Jeor Equation</strong></small>
                    <?php endif; ?>
                </div>

                <?php if (!$result['bodyfat']) : ?>
                    <?= $this->include('formulae/mifflinStJeorEquation') ?>
                <?php else : ?>
                    <?= $this->include('formulae/katchMcArdleEquation') ?>
                <?php endif; ?>

                <div class="row mb-5">
                    <div class="col-12 col-lg-6">
                        <article>
                            <h2>Your ideal weight</h2>

                            <p class="lead">[comming soon...]</p>
                        </article>
                    </div>
                    <div class="col-12 col-lg-6">
                        <article>
                            <h2>Body Mass Index Score</h2>

                            <div class="alert alert-primary text-center" role="alert">
                                <strong><?= round($result['bodyMassIndex'], 2) ?></strong>
                            </div>

                            <table class="table align-middle table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">Category</th>
                                        <th scope="col">BMI range - kg/m<sup>2</sup></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr <?= ($result['bodyMassIndex'] < 16) ? 'class="table-primary"' : '' ?>>
                                        <td>Severe Thinness</td>
                                        <td>&lt; 16</td>
                                    </tr>
                                    <tr <?= ($result['bodyMassIndex'] >= 16 && $result['bodyMassIndex'] < 17) ? 'class="table-primary"' : '' ?>>
                                        <td>Moderate Thinness</td>
                                        <td>16 - 17</td>
                                    </tr>
                                    <tr <?= ($result['bodyMassIndex'] >= 17 && $result['bodyMassIndex'] < 18.5) ? 'class="table-primary"' : '' ?>>
                                        <td>Mild Thinness</td>
                                        <td>17 - 18.5</td>
                                    </tr>

                                    <tr <?= ($result['bodyMassIndex'] >= 18.5 && $result['bodyMassIndex'] < 25) ? 'class="table-primary"' : '' ?>>
                                        <td>Normal</td>
                                        <td>18.5 - 25</td>
                                    </tr>
                                    <tr <?= ($result['bodyMassIndex'] >= 25 && $result['bodyMassIndex'] < 30) ? 'class="table-primary"' : '' ?>>
                                        <td>Overweight</td>
                                        <td>25 - 30</td>
                                    </tr>
                                    <tr <?= ($result['bodyMassIndex'] >= 30 && $result['bodyMassIndex'] < 35) ? 'class="table-primary"' : '' ?>>
                                        <td>Obese Class I</td>
                                        <td>30 - 35</td>
                                    </tr>
                                    <tr <?= ($result['bodyMassIndex'] >= 35 && $result['bodyMassIndex'] < 40) ? 'class="table-primary"' : '' ?>>
                                        <td>Obese Class II</td>
                                        <td>35 - 40</td>
                                    </tr>
                                    <tr <?= ($result['bodyMassIndex'] > 40) ? 'class="table-primary"' : '' ?>>
                                        <td>Obese Class III</td>
                                        <td>&gt; 40</td>
                                    </tr>
                                </tbody>
                            </table>
                        </article>
                    </div>
                </div>

                <?php if ($result['bodyfat']) : ?>
                    <?= $this->include('formulae/mifflinStJeorEquation') ?>
                <?php else : ?>
                    <?= $this->include('formulae/katchMcArdleEquation') ?>
                <?php endif; ?>

                <article class="mb-5">
                    <h2>Revised Harris-Benedict Equation</h2>

                    <table class="table align-middle table-hover">
                        <tbody>
                            <tr>
                                <td>Basal Metabolic Rate</td>
                                <td><?= round($result['harrisBenedictEquation']) ?> <small>kcal per day</small></td>
                            </tr>

                            <tr <?= ($result['activity'] == 1.2) ? 'class="table-primary"' : '' ?>>
                                <td>Sedentary</td>
                                <td><?= round($result['harrisBenedictEquation'] * 1.2) ?> <small>kcal per day</small></td>
                            </tr>

                            <tr <?= ($result['activity'] == 1.375) ? 'class="table-primary"' : '' ?>>
                                <td>Light Exercise</td>
                                <td><?= round($result['harrisBenedictEquation'] * 1.375) ?> <small>kcal per day</small></td>
                            </tr>

                            <tr <?= ($result['activity'] == 1.55) ? 'class="table-primary"' : '' ?>>
                                <td>Moderate Exercise</td>
                                <td><?= round($result['harrisBenedictEquation'] * 1.55) ?> <small>kcal per day</small></td>
                            </tr>

                            <tr <?= ($result['activity'] == 1.725) ? 'class="table-primary"' : '' ?>>
                                <td>Heavy Exercise</td>
                                <td><?= round($result['harrisBenedictEquation'] * 1.725) ?> <small>kcal per day</small></td>
                            </tr>

                            <tr <?= ($result['activity'] == 1.9) ? 'class="table-primary"' : '' ?>>
                                <td>Athlete</td>
                                <td><?= round($result['harrisBenedictEquation'] * 1.9) ?> <small>kcal per day</small></td>
                            </tr>
                        </tbody>
                    </table>
                </article>

            </div>
        <?php else : ?>
            <div class="col-md-4 offset-md-1" align="center">
                <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-7652010184274494" crossorigin="anonymous"></script>
                <!-- Calculator Home Skyscraper -->
                <ins class="adsbygoogle" style="display:block" data-ad-client="ca-pub-7652010184274494" data-ad-slot="2862702568" data-ad-format="auto" data-full-width-responsive="true"></ins>
                <script>
                    (adsbygoogle = window.adsbygoogle || []).push({});
                </script>
            </div>
        <?php endif; ?>
    </div>
</div>

<?= $this->endSection() ?>