<?php

namespace Database\Seeders;

use App\Models\Portfolio\Experience;
use App\Models\Portfolio\Profile;
use App\Models\Portfolio\Project;
use App\Models\Portfolio\Skill;
use App\Models\Portfolio\SocialLink;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PortfolioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Prefer Superadmin/Admin; fallback to first available user
        $user = User::role('Superadmin')->first()
            ?? User::role('Admin')->first()
            ?? User::first();

        if (!$user) {
            return;
        }

        // Create profile
        $profile = Profile::updateOrCreate(
            ['user_id' => $user->id],
            [
                'name' => 'م. ليلى الحربي',
                'email' => 'layla.architect@example.com',
                'phone' => '+966 50 123 4567',
                'bio' => 'مهندسة معمارية متخصصة في المشاريع السكنية ومتعددة الاستخدامات، أركز على تصميم إنساني، استدامة عملية، وتنفيذ دقيق من الفكرة حتى التسليم.',
                'job_title' => 'مهندس معماري رئيسي',
                'location' => 'الرياض، المملكة العربية السعودية',
            ]
        );

        // Create skills
        $skills = [
            [
                'name' => 'التصميم المفاهيمي',
                'percentage' => 96,
                'order' => 1,
            ],
            [
                'name' => 'نمذجة معلومات البناء (Revit)',
                'percentage' => 92,
                'order' => 2,
            ],
            [
                'name' => 'وثائق التنفيذ',
                'percentage' => 94,
                'order' => 3,
            ],
            [
                'name' => 'تصميم الواجهات',
                'percentage' => 88,
                'order' => 4,
            ],
            [
                'name' => 'التصميم البارامتري (Rhino/Grasshopper)',
                'percentage' => 82,
                'order' => 5,
            ],
            [
                'name' => 'تخطيط الفراغات الداخلية',
                'percentage' => 86,
                'order' => 6,
            ],
            [
                'name' => 'التصميم المستدام (مبادئ LEED)',
                'percentage' => 84,
                'order' => 7,
            ],
            [
                'name' => 'التنسيق الموقعي',
                'percentage' => 90,
                'order' => 8,
            ],
        ];

        foreach ($skills as $skill) {
            Skill::updateOrCreate(
                [
                    'user_id' => $user->id,
                    'name' => $skill['name'],
                ],
                [
                    'percentage' => $skill['percentage'],
                    'order' => $skill['order'],
                ]
            );
        }

        // Create projects
        $projects = [
            [
                'name' => 'مجمع فلل وادي الأفق',
                'slug' => 'wadi-horizon-villa-compound',
                'summary' => 'مجمع سكني خاص يوازن بين الخصوصية، الإضاءة الطبيعية، وجودة المساحات الخارجية.',
                'description' => 'تخطيط عمراني لمجمع يضم 42 فيلا مع أفنية داخلية متدرجة وحلول تظليل وتبريد سلبي، مع تكامل المناظر الطبيعية ومسارات المشاة وإخراج كامل لحزم التصميم حتى الطرح.',
                'github_link' => 'https://www.behance.net/gallery/192001101/Wadi-Horizon-Villa-Compound',
                'demo_link' => 'https://example.com/wadi-horizon-villa-compound',
                'order' => 1,
                'featured' => true,
            ],
            [
                'name' => 'برج النور للأعمال',
                'slug' => 'al-noor-business-tower',
                'summary' => 'برج إداري من 28 طابقًا بواجهة عالية الكفاءة ومساحات عمل مرنة.',
                'description' => 'يركز المشروع على تنظيم نواة الحركة بكفاءة، ومرونة تقسيم المساحات للمستأجرين، وواجهة متجاوبة مع المناخ لتقليل الأحمال الحرارية، مع تطوير المراحل المفاهيمية والمخططات الأولية واعتمادات الجهات.',
                'github_link' => 'https://www.behance.net/gallery/192001404/Al-Noor-Business-Tower',
                'demo_link' => 'https://example.com/al-noor-business-tower',
                'order' => 2,
                'featured' => true,
            ],
            [
                'name' => 'توسعة متحف الصحراء للفنون',
                'slug' => 'sahara-art-museum-extension',
                'summary' => 'توسعة ثقافية تربط بين المبنى القائم والمعاصر عبر فراغات عرض موجهة بالضوء.',
                'description' => 'تشمل التوسعة قاعات عرض بإضاءة طبيعية منضبطة، وساحة عامة، وبهو فعاليات متعدد الاستخدام، مع الحفاظ على هوية المبنى القائم وتحسين حركة الزوار والأداء البيئي.',
                'github_link' => 'https://www.behance.net/gallery/192001809/Sahara-Art-Museum-Extension',
                'demo_link' => 'https://example.com/sahara-art-museum-extension',
                'order' => 3,
                'featured' => true,
            ],
            [
                'name' => 'فندق بالم كريك البوتيكي',
                'slug' => 'palm-creek-boutique-hotel',
                'summary' => 'فندق بوتيكي يضم 72 غرفة يركز على تجربة الضيافة الهادئة والارتباط بالطبيعة.',
                'description' => 'يجمع المشروع بين تجربة نزلاء راقية وكفاءة تشغيلية عبر تنظيم وظيفي واضح واستمرارية بصرية بين الداخل والخارج، مع تطوير الهوية التصميمية والتفاصيل الداخلية.',
                'github_link' => 'https://www.behance.net/gallery/192002233/Palm-Creek-Boutique-Hotel',
                'demo_link' => 'https://example.com/palm-creek-boutique-hotel',
                'order' => 4,
                'featured' => false,
            ],
            [
                'name' => 'مركز رمال المجتمعي',
                'slug' => 'rimal-community-center',
                'summary' => 'مركز مجتمعي يضم قاعات مرنة واستوديوهات تعليمية وساحات عامة.',
                'description' => 'تم تصميم المركز لدعم الحياة اليومية للحي عبر فراغات متعددة الاستخدام تستضيف ورش العمل والفعاليات والأنشطة الاجتماعية، مع تركيز على سهولة الوصول ووضوح الحركة.',
                'github_link' => 'https://www.behance.net/gallery/192002611/Rimal-Community-Center',
                'demo_link' => 'https://example.com/rimal-community-center',
                'order' => 5,
                'featured' => false,
            ],
        ];

        foreach ($projects as $project) {
            Project::updateOrCreate(
                [
                    'user_id' => $user->id,
                    'slug' => $project['slug'],
                ],
                [
                    'name' => $project['name'],
                    'summary' => $project['summary'],
                    'description' => $project['description'],
                    'github_link' => $project['github_link'],
                    'demo_link' => $project['demo_link'],
                    'order' => $project['order'],
                    'featured' => $project['featured'],
                ]
            );
        }

        // Create experiences
        $experiences = [
            [
                'company_name' => 'استوديو أتيليه العمراني',
                'role' => 'مهندس معماري رئيسي',
                'start_year' => '2022',
                'current' => true,
                'summary' => 'قيادة فرق متعددة التخصصات في مشاريع سكنية وثقافية ومتعددة الاستخدام من الفكرة حتى الطرح، مع الإشراف على جودة التصميم والتنسيق مع العملاء والاستشاريين.',
                'company_website' => 'https://example.com/atelier-urban-studio',
                'order' => 1,
            ],
            [
                'company_name' => 'نيكسس للاستشارات المعمارية',
                'role' => 'مهندس مشروع أول',
                'start_year' => '2019',
                'end_year' => '2022',
                'current' => false,
                'summary' => 'تنفيذ مشاريع تجارية وفندقية مع تركيز على التفاصيل التنفيذية والاشتراطات النظامية والتنسيق بين التخصصات عبر BIM.',
                'company_website' => 'https://example.com/nexus-architects',
                'order' => 2,
            ],
            [
                'company_name' => 'فورم آند سبيس للاستشارات',
                'role' => 'مصمم معماري',
                'start_year' => '2017',
                'end_year' => '2019',
                'current' => false,
                'summary' => 'المساهمة في إعداد مفاهيم التصميم والنمذجة ثلاثية الأبعاد وعروض المشاريع لمخططات عمرانية ومشاريع سكنية خاصة.',
                'company_website' => 'https://example.com/form-and-space',
                'order' => 3,
            ],
        ];

        foreach ($experiences as $experience) {
            Experience::updateOrCreate(
                [
                    'user_id' => $user->id,
                    'company_name' => $experience['company_name'],
                    'role' => $experience['role'],
                ],
                [
                    'start_year' => $experience['start_year'],
                    'end_year' => $experience['end_year'] ?? null,
                    'current' => $experience['current'],
                    'summary' => $experience['summary'],
                    'company_website' => $experience['company_website'],
                    'order' => $experience['order'],
                ]
            );
        }

        // Create social links
        $socialLinks = [
            [
                'platform' => 'linkedin',
                'url' => 'https://www.linkedin.com/in/layla-alharbi-architect/',
                'order' => 1,
            ],
            [
                'platform' => 'behance',
                'url' => 'https://www.behance.net/laylaalharbi',
                'order' => 2,
            ],
            [
                'platform' => 'dribbble',
                'url' => 'https://dribbble.com/laylaalharbi',
                'order' => 3,
            ],
            [
                'platform' => 'instagram',
                'url' => 'https://instagram.com/laylaalharbi.arch',
                'order' => 4,
            ],
        ];

        foreach ($socialLinks as $socialLink) {
            SocialLink::updateOrCreate(
                [
                    'user_id' => $user->id,
                    'platform' => $socialLink['platform'],
                ],
                [
                    'url' => $socialLink['url'],
                    'order' => $socialLink['order'],
                ]
            );
        }
    }
}
