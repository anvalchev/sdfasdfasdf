<?= $this->extend('cms/layouts/' . $pageMeta['layout']) ?>

<?= $this->section('content') ?>

<div class="container">

    <div class="row">
        <div class="col pt-5 pb-4">

            <h1>Welcome!</h1>
            <p class="fs-5 col-md-8">Are you ready to embark on your fitness journey? Whether you're a beginner or an experienced fitness enthusiast, it's never too late to start making positive changes in your life. Our resources can help you set goals, track your progress and make the necessary adjustments to your diet and exercise routine. From our fit calculators to our glossary, we provide the tools and information you need to achieve your fitness goals. So don't wait any longer, start your journey today and experience the benefits of a healthier lifestyle!</p>

 

            <hr class="col-3 col-md-2 mb-5">

            <div class="row g-5">
                <div class="col-md-6">
                    <h2>Our Fit Calculators</h2>
                    <p>Ready to venture beyond this page? Check out some of our Fit Calculators!</p>
                    <ul class="icon-list ps-0">
                        <li class="d-flex align-items-start mb-1"><a href="<?= base_url('calculator/body-mass-index') ?>" rel="noopener" >Body Mass Index Calculator (BMI)</a></li>
                        <li class="d-flex align-items-start mb-1"><a href="<?= base_url('calculator/total-daily-energy-expenditure') ?>" rel="noopener" >Total Daily Energy Expenditure Calculator (TDEE)</a></li>
                        <li class="d-flex align-items-start mb-1"><a href="<?= base_url('our-fit-calculators') ?>" rel="noopener" >Show more...</a></li>
                    </ul>
                </div>

                <div class="col-md-6">
                    <h2>Glossary</h2>
                    <p>What to learn more? Our glossary is just for you!</p>
                    <ul class="icon-list ps-0">
                        <li class="d-flex align-items-start mb-1"><a href="<?= base_url('glossary/body-mass-index') ?>">Body Mass Index (BMI)</a></li>
                        <li class="d-flex align-items-start mb-1"><a href="<?= base_url('glossary/total-daily-energy-expenditure') ?>">Total Daily Energy Expenditure (TDEE)</a></li>
                        <!-- <li class="d-flex align-items-start mb-1"><a href="/docs/5.3/getting-started/parcel/">Bootstrap Parcel guide</a></li>
                        <li class="d-flex align-items-start mb-1"><a href="/docs/5.3/getting-started/vite/">Bootstrap Vite guide</a></li>
                        <li class="d-flex align-items-start mb-1"><a href="/docs/5.3/getting-started/contribute/">Contributing to Bootstrap</a></li> -->
                        <li class="d-flex align-items-start mb-1"><a href="<?= base_url('glossary') ?>" rel="noopener" >Show more...</a></li>
                    </ul>
                </div>
            </div>

        </div>
    </div>



</div>

<?= $this->endSection() ?>