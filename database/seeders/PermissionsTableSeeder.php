<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            [
                'id'    => 1,
                'title' => 'user_management_access',
            ],
            [
                'id'    => 2,
                'title' => 'permission_create',
            ],
            [
                'id'    => 3,
                'title' => 'permission_edit',
            ],
            [
                'id'    => 4,
                'title' => 'permission_show',
            ],
            [
                'id'    => 5,
                'title' => 'permission_delete',
            ],
            [
                'id'    => 6,
                'title' => 'permission_access',
            ],
            [
                'id'    => 7,
                'title' => 'role_create',
            ],
            [
                'id'    => 8,
                'title' => 'role_edit',
            ],
            [
                'id'    => 9,
                'title' => 'role_show',
            ],
            [
                'id'    => 10,
                'title' => 'role_delete',
            ],
            [
                'id'    => 11,
                'title' => 'role_access',
            ],
            [
                'id'    => 12,
                'title' => 'user_create',
            ],
            [
                'id'    => 13,
                'title' => 'user_edit',
            ],
            [
                'id'    => 14,
                'title' => 'user_show',
            ],
            [
                'id'    => 15,
                'title' => 'user_delete',
            ],
            [
                'id'    => 16,
                'title' => 'user_access',
            ],
            [
                'id'    => 17,
                'title' => 'audit_log_show',
            ],
            [
                'id'    => 18,
                'title' => 'audit_log_access',
            ],
            [
                'id'    => 19,
                'title' => 'user_alert_create',
            ],
            [
                'id'    => 20,
                'title' => 'user_alert_show',
            ],
            [
                'id'    => 21,
                'title' => 'user_alert_delete',
            ],
            [
                'id'    => 22,
                'title' => 'user_alert_access',
            ],
            [
                'id'    => 23,
                'title' => 'manage_competition_access',
            ],
            [
                'id'    => 24,
                'title' => 'competition_create',
            ],
            [
                'id'    => 25,
                'title' => 'competition_edit',
            ],
            [
                'id'    => 26,
                'title' => 'competition_show',
            ],
            [
                'id'    => 27,
                'title' => 'competition_delete',
            ],
            [
                'id'    => 28,
                'title' => 'competition_access',
            ],
            [
                'id'    => 29,
                'title' => 'category_create',
            ],
            [
                'id'    => 30,
                'title' => 'category_edit',
            ],
            [
                'id'    => 31,
                'title' => 'category_show',
            ],
            [
                'id'    => 32,
                'title' => 'category_delete',
            ],
            [
                'id'    => 33,
                'title' => 'category_access',
            ],
            [
                'id'    => 34,
                'title' => 'team_create',
            ],
            [
                'id'    => 35,
                'title' => 'team_edit',
            ],
            [
                'id'    => 36,
                'title' => 'team_show',
            ],
            [
                'id'    => 37,
                'title' => 'team_delete',
            ],
            [
                'id'    => 38,
                'title' => 'team_access',
            ],
            [
                'id'    => 39,
                'title' => 'team_manage_access',
            ],
            [
                'id'    => 40,
                'title' => 'position_create',
            ],
            [
                'id'    => 41,
                'title' => 'position_edit',
            ],
            [
                'id'    => 42,
                'title' => 'position_show',
            ],
            [
                'id'    => 43,
                'title' => 'position_delete',
            ],
            [
                'id'    => 44,
                'title' => 'position_access',
            ],
            [
                'id'    => 45,
                'title' => 'player_create',
            ],
            [
                'id'    => 46,
                'title' => 'player_edit',
            ],
            [
                'id'    => 47,
                'title' => 'player_show',
            ],
            [
                'id'    => 48,
                'title' => 'player_delete',
            ],
            [
                'id'    => 49,
                'title' => 'player_access',
            ],
            [
                'id'    => 50,
                'title' => 'country_create',
            ],
            [
                'id'    => 51,
                'title' => 'country_edit',
            ],
            [
                'id'    => 52,
                'title' => 'country_show',
            ],
            [
                'id'    => 53,
                'title' => 'country_delete',
            ],
            [
                'id'    => 54,
                'title' => 'country_access',
            ],
            [
                'id'    => 55,
                'title' => 'website_manage_access',
            ],
            [
                'id'    => 56,
                'title' => 'onboarding_create',
            ],
            [
                'id'    => 57,
                'title' => 'onboarding_edit',
            ],
            [
                'id'    => 58,
                'title' => 'onboarding_show',
            ],
            [
                'id'    => 59,
                'title' => 'onboarding_delete',
            ],
            [
                'id'    => 60,
                'title' => 'onboarding_access',
            ],
            [
                'id'    => 61,
                'title' => 'stage_create',
            ],
            [
                'id'    => 62,
                'title' => 'stage_edit',
            ],
            [
                'id'    => 63,
                'title' => 'stage_show',
            ],
            [
                'id'    => 64,
                'title' => 'stage_delete',
            ],
            [
                'id'    => 65,
                'title' => 'stage_access',
            ],
            [
                'id'    => 66,
                'title' => 'category_competition_create',
            ],
            [
                'id'    => 67,
                'title' => 'category_competition_edit',
            ],
            [
                'id'    => 68,
                'title' => 'category_competition_show',
            ],
            [
                'id'    => 69,
                'title' => 'category_competition_delete',
            ],
            [
                'id'    => 70,
                'title' => 'category_competition_access',
            ],
            [
                'id'    => 71,
                'title' => 'competition_team_create',
            ],
            [
                'id'    => 72,
                'title' => 'competition_team_edit',
            ],
            [
                'id'    => 73,
                'title' => 'competition_team_show',
            ],
            [
                'id'    => 74,
                'title' => 'competition_team_delete',
            ],
            [
                'id'    => 75,
                'title' => 'competition_team_access',
            ],
            [
                'id'    => 76,
                'title' => 'match_create',
            ],
            [
                'id'    => 77,
                'title' => 'match_edit',
            ],
            [
                'id'    => 78,
                'title' => 'match_show',
            ],
            [
                'id'    => 79,
                'title' => 'match_delete',
            ],
            [
                'id'    => 80,
                'title' => 'match_access',
            ],
            [
                'id'    => 81,
                'title' => 'staduim_create',
            ],
            [
                'id'    => 82,
                'title' => 'staduim_edit',
            ],
            [
                'id'    => 83,
                'title' => 'staduim_show',
            ],
            [
                'id'    => 84,
                'title' => 'staduim_delete',
            ],
            [
                'id'    => 85,
                'title' => 'staduim_access',
            ],
            [
                'id'    => 86,
                'title' => 'event_type_create',
            ],
            [
                'id'    => 87,
                'title' => 'event_type_edit',
            ],
            [
                'id'    => 88,
                'title' => 'event_type_show',
            ],
            [
                'id'    => 89,
                'title' => 'event_type_delete',
            ],
            [
                'id'    => 90,
                'title' => 'event_type_access',
            ],
            [
                'id'    => 91,
                'title' => 'match_event_create',
            ],
            [
                'id'    => 92,
                'title' => 'match_event_edit',
            ],
            [
                'id'    => 93,
                'title' => 'match_event_show',
            ],
            [
                'id'    => 94,
                'title' => 'match_event_delete',
            ],
            [
                'id'    => 95,
                'title' => 'match_event_access',
            ],
            [
                'id'    => 96,
                'title' => 'penlity_create',
            ],
            [
                'id'    => 97,
                'title' => 'penlity_edit',
            ],
            [
                'id'    => 98,
                'title' => 'penlity_show',
            ],
            [
                'id'    => 99,
                'title' => 'penlity_delete',
            ],
            [
                'id'    => 100,
                'title' => 'penlity_access',
            ],
            [
                'id'    => 101,
                'title' => 'lineup_create',
            ],
            [
                'id'    => 102,
                'title' => 'lineup_edit',
            ],
            [
                'id'    => 103,
                'title' => 'lineup_show',
            ],
            [
                'id'    => 104,
                'title' => 'lineup_delete',
            ],
            [
                'id'    => 105,
                'title' => 'lineup_access',
            ],
            [
                'id'    => 106,
                'title' => 'news_create',
            ],
            [
                'id'    => 107,
                'title' => 'news_edit',
            ],
            [
                'id'    => 108,
                'title' => 'news_show',
            ],
            [
                'id'    => 109,
                'title' => 'news_delete',
            ],
            [
                'id'    => 110,
                'title' => 'news_access',
            ],
            [
                'id'    => 111,
                'title' => 'banner_create',
            ],
            [
                'id'    => 112,
                'title' => 'banner_edit',
            ],
            [
                'id'    => 113,
                'title' => 'banner_show',
            ],
            [
                'id'    => 114,
                'title' => 'banner_delete',
            ],
            [
                'id'    => 115,
                'title' => 'banner_access',
            ],
            [
                'id'    => 116,
                'title' => 'client_create',
            ],
            [
                'id'    => 117,
                'title' => 'client_edit',
            ],
            [
                'id'    => 118,
                'title' => 'client_show',
            ],
            [
                'id'    => 119,
                'title' => 'client_delete',
            ],
            [
                'id'    => 120,
                'title' => 'client_access',
            ],
            [
                'id'    => 121,
                'title' => 'profile_password_edit',
            ],
        ];

        Permission::insert($permissions);
    }
}
