<article class="mb-5">
    <h2>Katch-McArdle Equation</h2>

    <table class="table align-middle table-hover">
        <thead>
            <tr>
                <th scope="col">Activity Level</th>
                <?php if ($result['bodyfat']) : ?>
                    <th scope="col">By Body Fat Percentage</th>
                <?php endif; ?>
                <th scope="col">By Weight and Height</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Basal Metabolic Rate</td>
                <?php if ($result['bodyfat']) : ?>
                    <td><?= round($result['katchMcArdleEquationByBodyFatPercentage']) ?> <small>kcal per day</small></td>
                <?php endif; ?>
                <td><?= round($result['katchMcArdleEquationByWeightAndHeight']) ?> <small>kcal per day</small></td>
            </tr>

            <tr <?= ($result['activity'] == 1.2) ? 'class="table-primary"' : '' ?>>
                <td>Sedentary</td>
                <?php if ($result['bodyfat']) : ?>
                    <td><?= round($result['katchMcArdleEquationByBodyFatPercentage'] * 1.2) ?> <small>kcal per day</small></td>
                <?php endif; ?>
                <td><?= round($result['katchMcArdleEquationByWeightAndHeight'] * 1.2) ?> <small>kcal per day</small></td>
            </tr>

            <tr <?= ($result['activity'] == 1.375) ? 'class="table-primary"' : '' ?>>
                <td>Light Exercise</td>
                <?php if ($result['bodyfat']) : ?>
                    <td><?= round($result['katchMcArdleEquationByBodyFatPercentage'] * 1.375) ?> <small>kcal per day</small></td>
                <?php endif; ?>
                <td><?= round($result['katchMcArdleEquationByWeightAndHeight'] * 1.375) ?> <small>kcal per day</small></td>
            </tr>

            <tr <?= ($result['activity'] == 1.55) ? 'class="table-primary"' : '' ?>>
                <td>Moderate Exercise</td>
                <?php if ($result['bodyfat']) : ?>
                    <td><?= round($result['katchMcArdleEquationByBodyFatPercentage'] * 1.55) ?> <small>kcal per day</small></td>
                <?php endif; ?>
                <td><?= round($result['katchMcArdleEquationByWeightAndHeight'] * 1.55) ?> <small>kcal per day</small></td>
            </tr>

            <tr <?= ($result['activity'] == 1.725) ? 'class="table-primary"' : '' ?>>
                <td>Heavy Exercise</td>
                <?php if ($result['bodyfat']) : ?>
                    <td><?= round($result['katchMcArdleEquationByBodyFatPercentage'] * 1.725) ?> <small>kcal per day</small></td>
                <?php endif; ?>
                <td><?= round($result['katchMcArdleEquationByWeightAndHeight'] * 1.725) ?> <small>kcal per day</small></td>
            </tr>

            <tr <?= ($result['activity'] == 1.9) ? 'class="table-primary"' : '' ?>>
                <td>Athlete</td>
                <?php if ($result['bodyfat']) : ?>
                    <td><?= round($result['katchMcArdleEquationByBodyFatPercentage'] * 1.9) ?> <small>kcal per day</small></td>
                <?php endif; ?>
                <td><?= round($result['katchMcArdleEquationByWeightAndHeight'] * 1.9) ?> <small>kcal per day</small></td>
            </tr>
        </tbody>
    </table>
</article>