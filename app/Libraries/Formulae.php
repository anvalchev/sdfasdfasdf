<?php

namespace App\Libraries;

class Formulae
{

    public static function bodyMassIndex(int $weight, int $height)
    {
        // Body mass index - BMI
        // BMI, formerly called the Quetelet index, is a measure for indicating nutritional status in adults. It is defined as a person’s weight in kilograms divided by the square of the person’s height in metres (kg/m2). For example, an adult who weighs 70 kg and whose height is 1.75 m will have a BMI of 22.9.

        // 70 (kg)/1.752 (m2) = 22.9 BMI

        // For adults over 20 years old, BMI falls into one of the following categories.

        $heightInMeters = $height / 100;

        $bodyMassIndex = $weight / ($heightInMeters * $heightInMeters);

        return $bodyMassIndex;
    }

    public static function leanBodyMassByWeightAndHeight(int $weight, int $height, string|bool $gender)
    {
        // Usign Weight & Height
        // For men: Lean body mass = (0.32810 × W) + (0.33929 × H) − 29.5336
        // For women: Lean body mass = (0.29569 × W) + (0.41813 × H) − 43.2933

        if (strtolower($gender) == 'male' || $gender == true) {
            $leanBodyMass = (0.32810 * $weight) + (0.33929 * $height) - 29.5336;
        }
        if (strtolower($gender) == 'female' || $gender == false) {
            $leanBodyMass = (0.29569 * $weight) + (0.41813 * $height) - 43.2933;
        }

        return $leanBodyMass;
    }

    public static function leanBodyMassByBodyFatPercentage(int $weight, int $bodyfat)
    {
        // Using Body Fat Percentage
        // You can also use your body fat percentage to work out your lean body mass, as mentioned above. Divide your percent body fat by 100 to make it a decimal. Then multiply this number by your total weight.

        // For example, if you weigh 80kg and have learned that your body fat percentage is 15%, multiply 80 x 0.15. This is your fat mass in kilograms (800 x 0.15 = 12kg). Then simply subtract this from your total weight to get your lean body mass. Here, we are looking at 80 - 12 = 68kg of lean body mass.

        // The tricky part here is finding out your body fat percentage. The techniques below will all enable you to do so but the trade-off mentioned above comes into play: generally, the more accurate the method, the less accessible it is to most people.

        $leanBodyMass = $weight - ($weight * ($bodyfat / 100));

        return $leanBodyMass;
    }

    public static function mifflinStJeorEquation(int $weight, int $height, int $age, string|bool $gender)
    {
        // Mifflin-St Jeor Equation
        // Mifflin = (10.m + 6.25h - 5.0a) + s
        // m is mass in kg, h is height in cm, a is age in years, s is +5 for males and -151 for females

        if (strtolower($gender) == 'male' || $gender == true) {
            $s = 5;
        }
        if (strtolower($gender) == 'female' || $gender == false) {
            $s = -151;
        }

        $mifflinStJeor = (10 * $weight + 6.25 * $height - 5 * $age) + $s;

        return $mifflinStJeor;
    }

    public static function katchMcArdleEquation($leanBodyMass)
    {
        // Katch-McArdle Equation
        // Katch = 370 + (21.6 * LBM)
        // where LBM is lean body mass

        $katchMcArdle = 370 + (21.6 * $leanBodyMass);

        return $katchMcArdle;
    }

    public static function harrisBenedictEquation(int $weight, int $height, int $age, string|bool $gender)
    {
        // Harris-Benedict = (13.397m + 4.799h - 5.677a) + 88.362 (MEN)
        // Harris-Benedict = (9.247m + 3.098h - 4.330a) + 447.593 (WOMEN)
        // m is mass in kg, h is height in cm, a is age in years

        if (strtolower($gender) == 'male' || $gender == true) {
            $harrisBenedict = (13.397 * $weight + 4.799 * $height - 5.677 * $age) + 88.362;
        }
        if (strtolower($gender) == 'female' || $gender == false) {
            $harrisBenedict = (9.247 * $weight + 3.098 * $height - 4.330 * $age) + 447.593;
        }

        return $harrisBenedict;
    }
}
