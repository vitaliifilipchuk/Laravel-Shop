<?php

use Illuminate\Database\Seeder;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $product = new \App\Product([
            'image' => 'HP7cover.jpg',
            'title' => 'Harry Potter and the Deathly Hallows',
            'author' => 'J.K. Rowling',
            'description' => 'As Harry races against time and evil to destroy the Horcruxes, he uncovers the existence of three most powerful objects in the wizarding world: the Deathly Hallows.',
            'category_id' => 6,
            'price' => 15
        ]);
        $product->save();

        $product = new \App\Product([
            'image' => 'HP4cover.jpg',
            'title' => 'Harry Potter and the Goblet of Fire',
            'author' => 'J.K. Rowling',
            'description' => 'A young wizard finds himself competing in a hazardous tournament between rival schools of magic, but he is distracted by recurring nightmares.',
            'category_id' => 6,
            'price' => 13
        ]);
        $product->save();

        $product = new \App\Product([
            'image' => 'lotr.jpg',
            'title' => 'The Lord of the Rings',
            'author' => 'J.R.R. Tolkien',
            'description' => 'A meek Hobbit from the Shire and eight companions set out on a journey to destroy the powerful One Ring and save Middle Earth from the Dark Lord Sauron.',
            'category_id' => 6,
            'price' => 20
        ]);
        $product->save();

        $product = new \App\Product([
            'image' => '183675.jpg',
            'title' => 'A Game of Thrones',
            'author' => 'George R.R. Martin',
            'description' => 'A Game of Thrones is set in the Seven Kingdoms of Westeros, a land reminiscent of Medieval Europe. In Westeros the seasons last for years, sometimes decades, at a time.',
            'category_id' => 6,
            'price' => 15
        ]);
        $product->save();

        $product = new \App\Product([
            'image' => '42266.jpg',
            'title' => 'The Name of the Wind',
            'author' => 'Patrick Rothfuss',
            'description' => 'Told in Kvothe\'s own voice, this is the tale of the magically gifted young man who grows to be the most notorious wizard his world has ever seen. ',
            'category_id' => 6,
            'price' => 12
        ]);
        $product->save();

        $product = new \App\Product([
            'image' => '46924.jpg',
            'title' => 'The Wise Man\'s Fear',
            'author' => 'Patrick Rothfuss',
            'description' => 'In The Wise Man\'s Fear, Kvothe searches for answers, attempting to uncover the truth about the mysterious Amyr, the Chandrian, and the death of his parents.',
            'category_id' => 6,
            'price' => 15
        ]);
        $product->save();

        $product = new \App\Product([
            'image' => 'dune1.jpg',
            'title' => 'Dune',
            'author' => 'Frank Patrick Herbert',
            'description' => 'A Duke\'s son leads desert warriors against the galactic emperor and his father\'s evil nemesis when they assassinate his father and free their desert world from the emperor\'s rule.',
            'category_id' => 6,
            'price' => 15
        ]);
        $product->save();

        $product = new \App\Product([
            'image' => 'dune2.jpg',
            'title' => 'Dune Messiah',
            'author' => 'Frank Patrick Herbert',
            'description' => 'Dune Messiah continues the story of the man Muad\'dib, heir to a power unimaginable, bringing to completion the centuries-old scheme to create a super-being.',
            'category_id' => 6,
            'price' => 15
        ]);
        $product->save();

        $product = new \App\Product([
            'image' => 'dune3.jpg',
            'title' => 'Children of Dune',
            'author' => 'Frank Patrick Herbert',
            'description' => 'The desert planet of Arrakis has begun to grow green and lush. The life-giving spice is abundant. The nine-year-old royal twins, possesing their father\'s supernatural powers, are being groomed as Messiahs.',
            'category_id' => 6,
            'price' => 15
        ]);
        $product->save();

        $product = new \App\Product([
            'image' => 'cook1.jpg',
            'title' => 'The Flavor Bible',
            'author' => 'Karen Page, Andrew Dornenburg',
            'description' => 'Great cooking goes beyond following a recipe--it\'s knowing how to season ingredients to coax the greatest possible flavor from them. Drawing on dozens of leading chefs\' combined experience in top restaurants across the country, Karen Page and Andrew Dornenburg present the definitive guide to creating "deliciousness" in any dish.',
            'category_id' => 8,
            'price' => 25
        ]);
        $product->save();

        $product = new \App\Product([
            'image' => 'cook2.jpg',
            'title' => 'Kitchen Confidential',
            'author' => 'Anthony Bourdain',
            'description' => 'A deliciously funny, delectably shocking banquet of wild-but-true tales of life in the culinary trade from Chef Anthony Bourdain, laying out his more than a quarter-century of drugs, sex, and haute cuisine—now with all-new, never-before-published material.',
            'category_id' => 8,
            'price' => 19
        ]);
        $product->save();

        $product = new \App\Product([
            'image' => 'cook3.jpg',
            'title' => 'Artisan Bread in Five Minutes a Day',
            'author' => 'Jeff Hertzberg',
            'description' => 'There\'s nothing like the smell of freshly baked bread to fill a kitchen with warmth, eager appetites, and endless praise for the baker who took on such a time-consuming task. Now, you can fill your kitchen with the irresistible aromas of a French bakery every day with just five minutes of active preparation time, and Artisan Bread in Five Minutes a Day will show you how.',
            'category_id' => 8,
            'price' => 10
        ]);
        $product->save();

        $product = new \App\Product([
            'image' => 'mystery1.jpg',
            'title' => 'The Girl with the Dragon Tattoo',
            'author' => 'Stieg Larsson',
            'description' => 'A spellbinding amalgam of murder mystery, family saga, love story and financial intrigue.',
            'category_id' => 7,
            'price' => 15
        ]);
        $product->save();

        $product = new \App\Product([
            'image' => 'mystery2.jpg',
            'title' => 'And Then There Were None',
            'author' => 'Agatha Christie',
            'description' => 'First, there were ten - a curious assortment of strangers summoned as weekend guests to a private island off the coast of Devon. Their host, an eccentric millionaire unknown to all of them, is nowhere to be found.',
            'category_id' => 7,
            'price' => 15
        ]);
        $product->save();

        $product = new \App\Product([
            'image' => 'mystery3.jpg',
            'title' => 'The Hound of the Baskervilles',
            'author' => 'Arthur Conan Doyle',
            'description' => 'Holmes and Watson are faced with their most terrifying case yet. The legend of the devil-beast that haunts the moors around the Baskerville family\'s home warns the descendants of that ancient clan never to venture out in those dark hours when the power of evil is exalted. Now, the most recent Baskerville, Sir Charles, is dead and the footprints of a giant hound have been found near his body. Will the new heir meet the same fate?',
            'category_id' => 7,
            'price' => 15
        ]);
        $product->save();

        $product = new \App\Product([
            'image' => 'health1.jpg',
            'title' => 'Food Rules: An Eater\'s Manual',
            'author' => 'Michael Pollan',
            'description' => 'Eating doesn\'t have to be so complicated. In this age of ever-more elaborate diets and conflicting health advice, Food Rules brings a welcome simplicity to our daily decisions about food. ',
            'category_id' => 9,
            'price' => 15
        ]);
        $product->save();

        $product = new \App\Product([
            'image' => 'health2.jpg',
            'title' => 'Good Calories, Bad Calories',
            'author' => 'Gary Taubes',
            'description' => 'For decades we have been taught that fat is bad for us, carbohydrates better, and that the key to a healthy weight is eating less and exercising more. Yet despite this advice, we have seen unprecedented epidemics of obesity and diabetes. Taubes argues that the problem lies in refined carbohydrates, like white flour, easily digested starches, and sugars, and that the key to good health is the kind of calories we take in, not the number.',
            'category_id' => 9,
            'price' => 15
        ]);
        $product->save();

        $product = new \App\Product([
            'image' => 'edu1.jpg',
            'title' => 'Theory and Practice of Counseling and Psychotherapy',
            'author' => 'Gerald Corey',
            'description' => 'Incorporating the thinking, feeling, and behaving dimensions of human experience, the tenth edition of Corey\'s best-selling book helps students compare and contrast the therapeutic models expressed in counseling theories.',
            'category_id' => 10,
            'price' => 15
        ]);
        $product->save();

        $product = new \App\Product([
            'image' => 'edu2.jpg',
            'title' => 'Human Anatomy & Physiology',
            'author' => 'Elaine N. Marieb, Katja Hoehn',
            'description' => 'Human Anatomy & Physiology has launched the careers of more than three million healthcare professionals. With the newly revised Tenth Edition, Marieb and Hoehnintroduce a clear pathway through A&P that helps students and instructors focus on key concepts and make meaningful connections.',
            'category_id' => 10,
            'price' => 15
        ]);
        $product->save();

    }
}
