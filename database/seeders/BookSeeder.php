<?php

namespace Database\Seeders;

use App\Models\Author;
use App\Models\Book;
use App\Models\Category;
use App\Models\Publisher;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $book1 = Book::create([
            'category_id' => Category::where('name', 'business management')->first()->id,
            'publisher_id' => Publisher::where('name', 'Harvard Business Review Press')->first()->id,
            'title' => 'Blue Ocean Strategy',
            'description' => 'OVER 4 MILLION COPIES SOLD WALL STREET JOURNAL AND BUSINESSWEEK
                              BESTSELLER RECOGNIZED AS ONE OF THE MOST ICONIC AND IMPACTFUL STRATEGY
                              BOOKS EVER WRITTEN The global phenomenon that has sold over 4 million
                              copies, is published in a record-breaking 46 languages and is a
                              bestseller across five continents--now updated and expanded with new
                              content. Named by Fast Company as one of the most influential
                              leadership books in its Leadership Hall of Fame. A strategy classic.
                              In this perennial bestseller, embraced by organizations and industries
                              worldwide, globally preeminent management thinkers W. Chan Kim and Renee
                              Mauborgne challenge everything you thought you knew about the requirements
                              for strategic success. Recognized as one of the most iconic and impactful
                              strategy books ever written, BLUE OCEAN STRATEGY, now updated with fresh
                              content from the authors, argues that cutthroat competition results in
                              nothing but a bloody red ocean of rivals fighting over a shrinking profit
                              pool. Based on a study of 150 strategic moves (spanning more than 100 years
                              across 30 industries), the authors argue that lasting success comes not
                              from battling competitors but from creating "blue oceans"--untapped new
                              market spaces ripe for growth. BLUE OCEAN STRATEGY presents a systematic
                              approach to making the competition irrelevant and outlines principles and
                              tools any organization can use to create and capture their own blue oceans.
                              This expanded edition includes: A new preface by the authors: Help! My Ocean
                              Is Turning Red Updates on all cases and examples in the book, bringing their
                              stories up to the present time Two new chapters and an expanded third
                              one--Alignment, Renewal, and Red Ocean Traps --that address the most pressing
                              questions readers have asked over the past 10 years A landmark work that
                              upends traditional thinking about strategy, this bestselling book charts a
                              bold new path to winning the future. Consider this your guide to creating
                              uncontested market space--and making the competition irrelevant. To learn more
                              about the power of BLUE OCEAN STRATEGY, visit blueoceanstrategy.com. There
                              you`ll find all the resources you need--from ideas in practice and cases from
                              government and private industry, to teaching materials, mobile apps, real-time
                              updates, and tips and tools to help you make your blue ocean journey a success.
                              ',
            'number_of_copies' => '10',
            'number_of_pages' => '320',
            'price' => '21.99',
            'isbn' => '1625274491',
            'language' => 'English',
            'cover_image' => 'images/BlueOceanStrategy.jpg',
        ]);
        $book1->authors()->attach(Author::where('name' , 'RENEE A. MAUBORGNE & W. CHAN KIM')->first());

        $book2 = Book::create([
            'category_id' => Category::where('name', 'business management')->first()->id,
            'publisher_id' => Publisher::where('name', 'Black Bay Books')->first()->id,
            'title' => 'The Tipping Point',
            'description' => 'In this brilliant and original book, Malcolm Gladwell explains and analyses the
                             `tipping point`, that magic moment when ideas, trends and social behaviour cross
                             a threshold, tip and spread like wildfire. Taking a look behind the surface of
                             many familiar occurrences in our everyday world, Gladwell explains the fascinating
                             social dynamics that cause rapid change.',
            'number_of_copies' => '13',
            'number_of_pages' => '280',
            'price' => '12.00',
            'isbn' => '9780316679077',
            'language' => 'English',
            'cover_image' => 'images/TheTippingPoint.jpg',
        ]);
        $book2->authors()->attach(Author::where('name' , 'MALCOM GLADWELL')->first());

        $book3 = Book::create([
            'category_id' => Category::where('name', 'business management')->first()->id,
            'publisher_id' => Publisher::where('name', 'Plata Publishing')->first()->id,
            'title' => 'Rich Dad Poor Dad',
            'description' => 'It`S Been Nearly 25 Years Since Robert Kiyosaki`S Rich Dad Poor Dad
                              First Made Waves In The Personal Finance Arena.It Has Since Become The
                              1 Personal Finance Book Of All Time... Translated Into Dozens Of
                              Languages And Sold Around The World.Rich Dad Poor Dad Is Robert`S Story
                              Of Growing Up With Two Dads  His Real Father And The Father Of His Best
                              Friend, His Rich Dad  And The Ways In Which Both Men Shaped His Thoughts
                              About Money And Investing. The Book Explodes The Myth That You Need To Earn
                              A High Income To Be Rich And Explains The Difference Between Working For
                              Money And Having Your Money Work For You.20 Years... 20/20 Hindsight In The
                              20Th Anniversary Edition Of This Classic, Robert Offers An Update On What
                              We’Ve Seen Over The Past 20 Years Related To Money, Investing, And The Global
                              Economy. Sidebars Throughout The Book Will Take Readers Fast Forward” 
                              From 1997 To Today  As Robert Assesses How The Principles Taught By His Rich
                              Dad Have Stood The Test Of Time. In Many Ways, The Messages Of Rich Dad Poor
                              Dad, Messages That Were Criticized And Challenged Two Decades Ago, Are More
                              Meaningful, Relevant And Important Today Than They Were 20 Years Ago. As
                              Always, Readers Can Expect That Robert Will Be Candid, Insightful... And
                              Continue To Rock More Than A Few Boats In His Retrospective. Will There Be A
                              Few Surprises? Count On It. Rich Dad Poor Dad...  Explodes The Myth That You
                              Need To Earn A High Income To Become Rich Challenges The Belief That Your
                              House Is An Asset Shows Parents Why They Can`T Rely On The School System To
                              Teach Their Kids About Money Defines Once And For All An Asset And A
                              Liability Teaches You What To Teach Your Kids About Money For Their Future
                              Financial Success',
            'number_of_copies' => '20',
            'number_of_pages' => '336',
            'price' => '10.00',
            'isbn' => '1612680194',
            'language' => 'English',
            'cover_image' => 'images/RichDadPoorDad.jpg',
        ]);
        $book3->authors()->attach(Author::where('name' , 'ROBERT T. KIYOSAKI')->first());

        $book4 = Book::create([
            'category_id' => Category::where('name', 'history')->first()->id,
            'publisher_id' => Publisher::where('name', 'Profile Books Ltd')->first()->id,
            'title' => 'Why Nations Fail',
            'description' => 'Shortlisted For The Financial Times And Goldman Sachs Business Book Of The Year
                              Award 2012. Why Are Some Nations More Prosperous Than Others? Why Nations Fail
                              Sets Out To Answer This Question, With A Compelling And Elegantly Argued New
                              Theory: That It Is Not Down To Climate, Geography Or Culture, But Because Of
                              Institutions. Drawing On An Extraordinary Range Of Contemporary And Historical
                              Examples, From Ancient Rome Through The Tudors To Modern-Day China, Leading
                              Academics Daron Acemoglu And James A. Robinson Show That To Invest And Prosper,
                              People Need To Know That If They Work Hard, They Can Make Money And Actually Keep
                              It - And This Means Sound Institutions That Allow Virtuous Circles Of Innovation,
                              Expansion And Peace. Based On Fifteen Years Of Research, And Answering The
                              Competing Arguments Of Authors Ranging From Max Weber To Jeffrey Sachs And Jared
                              Diamond, Acemoglu And Robinson Step Boldly Into The Territory Of Francis Fukuyama
                              And Ian Morris. They Blend Economics, Politics, History And Current Affairs To
                              Provide A New, Powerful And Persuasive Way Of Understanding Wealth And Poverty.',
            'number_of_copies' => '13',
            'number_of_pages' => '544',
            'price' => '19.99',
            'isbn' => '1846684307',
            'language' => 'English',
            'cover_image' => 'images/WhyNationsFail.jpg',
        ]);
        $book4->authors()->attach(Author::where('name' , 'DARON ACEMOGLU & JAMES A. ROBINSON')->first());

        $book5 = Book::create([
            'category_id' => Category::where('name', 'history')->first()->id,
            'publisher_id' => Publisher::where('name', 'Random House')->first()->id,
            'title' => 'Inside The Kingdom',
            'description' => 'Saudi Arabia is a country defined by paradox: it sits atop some of the richest
                              oil deposits in the world, and yet the country roiling disaffection produced sixteen of the
                              nineteen 9/11 hijackers. It is a modern state, driven by contemporary technology, and yet its
                              powerful religious establishment would have its customs and practices rolled back to match those
                              of the Prophet Muhammed over a thousand years ago. In a world where events in the Middle East
                              continue to have geopolitical consequences far beyond the region boundaries, an understanding of
                              this complex nation is essential. With Inside the Kingdom, British journalist and bestselling
                              author Robert Lacey has given us one of the most penetrating and insightful looks at Saudi Arabia
                              ever produced. More than twenty years after he first moved to the country to write about the
                              Saudis at the end of the oil boom, Lacey has returned to find out how the consequences of the
                              boom produced a society at war with itself. Filled with stories told by a broad range of Saudis,
                              from high princes and ambassadors to men and women on the street, Inside the Kingdom is in many
                              ways the story of the Saudis in their own words. It is a story of oil money that opened the door
                              to Western ways, and produced a conservative backlash with effects that are still being felt
                              today. It is a story of kings and princes who worried more about keeping power than the dangerous
                              consequences of empowering radical clerics. It is a story of men who challenged orthodoxy and
                              risked prison or death in the name of furthering open society, and of women who defied laws
                              saying they should not write, drive, or play sports. And, at its heart, it is a story of a
                              people attempting to reconcile the religious separatism of the past and the rapidly changing
                              world with which they are increasingly intertwined. Their success? or failure? will have
                              powerful reverberations in their own country, and across the globe',
            'number_of_copies' => '5',
            'number_of_pages' => '432',
            'price' => '99.99',
            'isbn' => '9780099539056',
            'language' => 'English',
            'cover_image' => 'images/InsideTheKingdom.jpg',
        ]);
        $book5->authors()->attach(Author::where('name' , 'ROBERT LACEY')->first());

        $book6 = Book::create([
            'category_id' => Category::where('name', 'computer science')->first()->id,
            'publisher_id' => Publisher::where('name', 'O`Reilly Media')->first()->id,
            'title' => 'Learning React 2nd Ediditon',
            'description' => 'If you want to learn how to build efficient React applications, this is
                              your book. Ideal for web developers and software engineers who
                              understand how JavaScript, CSS, and HTML work in the browser, this
                              updated edition provides best practices and patterns for writing modern
                              React code. No prior knowledge of React or functional programming is
                              necessary. Authors Alex Banks and Eve Porcello show you how to create UIs
                              that can deftly display changes without page reloads on large-scale
                              data-driven websites. You`ll also discover how to work with functional
                              programming and the latest ECMAScript features. Once you learn how to
                              build React components with this hands-on guide, you`ll understand just
                              how useful React can be in your organization. Understand key functional
                              programming concepts with JavaScript Look under the hood to learn how
                              React runs in the browser Create application presentation layers with
                              React components Manage data and reduce the time you spend debugging
                              applications Explore React`s component lifecycle to improve UI performance
                              Use a routing solution for single-page application features Learn how to
                              structure React applications with servers in mind',
            'number_of_copies' => '37',
            'number_of_pages' => '300',
            'price' => '31.56',
            'isbn' => '1492051721',
            'language' => 'English',
            'cover_image' => 'images/LearningReact.jpg',
        ]);
        $book6->authors()->attach(Author::where('name' , 'ALEX BANKS & EVE PROCELLO')->first());

        $book7 = Book::create([
            'category_id' => Category::where('name', 'computer science')->first()->id,
            'publisher_id' => Publisher::where('name', 'O`Reilly Media')->first()->id,
            'title' => 'React Cook Book',

            'description' => 'React helps you create and work on an app in just a few minutes. But
                              learning how to put all the pieces together is hard. How do you validate
                              a form? Or implement a complex multistep user action without writing
                              messy code? How do you test your code? Make it reusable? Wire it to a
                              backend? Keep it easy to understand? The React Cookbook delivers answers
                              fast. Many books teach you how to get started, understand the framework,
                              or use a component library with React, but very few provide examples to
                              help you solve particular problems. This easy-to-use cookbook includes the
                              example code developers need to unravel the most common problems when using
                              React, categorized by topic area and problem. You`ll learn how to: Build a
                              single-page application in React using a rich UI Create progressive web
                              applications that users can install and work with offline Integrate with
                              backend services such as REST and GraphQL Automatically test for
                              accessibility problems in your application Secure applications with
                              fingerprints and security tokens using WebAuthn Deal with bugs and avoid
                              common functional and performance problems',

            'number_of_copies' => '13',
            'number_of_pages' => '500',
            'price' => '70.63',
            'isbn' => '1492085847',
            'language' => 'English',
            'cover_image' => 'images/ReactCookBook.jpg',
        ]);
        $book7->authors()->attach(Author::where('name' , 'DAVID GRIFFITHS & DAWN GRIFFTHS')->first());

        $book8 = Book::create([
            'category_id' => Category::where('name', 'social sciences')->first()->id,
            'publisher_id' => Publisher::where('name', 'Simon & Schuster UK')->first()->id,
            'title' => 'Chip War',
            'description' => 'Power in the modern world - military, economic, geopolitical - is built on a
                            foundation of computer chips. America has maintained its lead as a superpower because it has
                            dominated advances in computer chips and all the technology that chips have enabled.
                            (Virtually everything runs on chips: cars, phones, the stock market, even the electric grid.)
                            Now that edge is in danger of slipping, undermined by the naïve assumption that globalising
                            the chip industry and letting players in Taiwan, Korea and Europe take over manufacturing
                            serves America`s interests. Currently, as Chip War reveals, China, which spends more on chips
                            than any other product, is pouring billions into a chip-building Manhattan Project to catch up to the US.
                            In Chip War economic historian Chris Miller recounts the fascinating sequence of events
                            that led to the United States perfecting chip design, and how faster chips helped defeat
                            the Soviet Union (by rendering the Russians` arsenal of precision-guided weapons obsolete).
                            The battle to control this industry will shape our future. China spends more money importing
                            chips than buying oil, and they are China`s greatest external vulnerability as they are
                            fundamentally reliant on foreign chips. But with 37 per cent of the global supply of chips
                            being made in Taiwan, within easy range of Chinese missiles, the West`s fear is that a
                            solution may be close at hand',
            'number_of_copies' => '100',
            'number_of_pages' => '464',
            'price' => '22.00',
            'isbn' => '1398504092',
            'language' => 'English',
            'cover_image' => 'images/ChipWar.jpg',
        ]);
        $book8->authors()->attach(Author::where('name' , 'CHRIS MILLER')->first());


        $book9 = Book::create([
            'category_id' => Category::where('name', 'social sciences')->first()->id,
            'publisher_id' => Publisher::where('name', 'Currency')->first()->id,
            'title' => 'The Fourth Industrial Revolution',
            'description' => 'World-renowned economist Klaus Schwab, Founder and Executive Chairman of
                              the World Economic Forum, explains that we have an opportunity to shape
                              the fourth industrial revolution, which will fundamentally alter how we
                              live and work. Schwab argues that this revolution is different in scale,
                              scope and complexity from any that have come before. Characterized by a
                              range of new technologies that are fusing the physical, digital and
                              biological worlds, the developments are affecting all disciplines,
                              economies, industries and governments, and even challenging ideas about
                              what it means to be human. Artificial intelligence is already all around
                              us, from supercomputers, drones and virtual assistants to 3D printing,
                              DNA sequencing, smart thermostats, wearable sensors and microchips smaller
                              than a grain of sand. But this is just the beginning: nanomaterials 200
                              times stronger than steel and a million times thinner than a strand of hair
                              and the first transplant of a 3D printed liver are already in development.
                              Imagine smart factories in which global systems of manufacturing are
                              coordinated virtually, or implantable mobile phones made of biosynthetic
                              materials. The fourth industrial revolution, says Schwab, is more
                              significant, and its ramifications more profound, than in any prior period
                              of human history. He outlines the key technologies driving this revolution
                              and discusses the major impacts expected on government, business, civil
                              society and individuals. Schwab also offers bold ideas on how to harness
                              these changes and shape a better futureone in which technology empowers
                              people rather than replaces them; progress serves society rather than
                              disrupts it; and in which innovators respect moral and ethical boundaries
                              rather than cross them. We all have the opportunity to contribute to
                              developing new frameworks that advance progress.',
            'number_of_copies' => '50',
            'number_of_pages' => '192',
            'price' => '17.50',
            'isbn' => '9781524758868',
            'language' => 'English',
            'cover_image' => 'images/TheFourthIR.jpg',
        ]);
        $book9->authors()->attach(Author::where('name' , 'KLAUS SCHWAB')->first());

    }
}
