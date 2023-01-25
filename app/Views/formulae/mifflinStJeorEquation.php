<article class="mb-5">
    <h2>Mifflin-St Jeor Equation</h2>

    <!-- <p class="lead">Based on your stats, the best estimate for your maintenance calories is <strong><?= !isset($result['mifflinStJeorEquation']) ?: round($result['mifflinStJeorEquation'] * $result['activity']) ?></strong> kcal per day based on the Mifflin-St Jeor Formula, which is widely known to be the most accurate. The table below shows the difference if you were to have selected a different activity level.</p> -->

    <table class="table align-middle table-hover">
        <tbody>
            <tr>
                <td>Basal Metabolic Rate</td>
                <td><?= round($result['mifflinStJeorEquation']) ?> <small>kcal per day</small></td>
            </tr>

            <tr <?= ($result['activity'] == 1.2) ? 'class="table-primary"' : '' ?>>
                <td>Sedentary</td>
                <td>
                    <?= round($result['mifflinStJeorEquation'] * 1.2) ?> <small>kcal per day</small>
                    <!-- <br>
                    (<?= round($result['mifflinStJeorEquation'] * 1.2) * 7 ?> <small>calories per week</small>) -->
                </td>
            </tr>

            <tr <?= ($result['activity'] == 1.375) ? 'class="table-primary"' : '' ?>>
                <td>Light Exercise</td>
                <td><?= round($result['mifflinStJeorEquation'] * 1.375) ?> <small>kcal per day</small></td>
            </tr>

            <tr <?= ($result['activity'] == 1.55) ? 'class="table-primary"' : '' ?>>
                <td>Moderate Exercise</td>
                <td><?= round($result['mifflinStJeorEquation'] * 1.55) ?> <small>kcal per day</small></td>
            </tr>

            <tr <?= ($result['activity'] == 1.725) ? 'class="table-primary"' : '' ?>>
                <td>Heavy Exercise</td>
                <td><?= round($result['mifflinStJeorEquation'] * 1.725) ?> <small>kcal per day</small></td>
            </tr>

            <tr <?= ($result['activity'] == 1.9) ? 'class="table-primary"' : '' ?>>
                <td>Athlete</td>
                <td><?= round($result['mifflinStJeorEquation'] * 1.9) ?> <small>kcal per day</small></td>
            </tr>
        </tbody>
    </table>
</article>