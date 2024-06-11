<div id="sidebar" class="c-sidebar c-sidebar-fixed c-sidebar-lg-show">

    <div class="c-sidebar-brand d-md-down-none">
        <a class="c-sidebar-brand-full h4" href="#">
            {{ trans('panel.site_title') }}
        </a>
    </div>

    <ul class="c-sidebar-nav">
        <li>
            <select class="searchable-field form-control">

            </select>
        </li>
        <li class="c-sidebar-nav-item">
            <a href="{{ route("admin.home") }}" class="c-sidebar-nav-link">
                <i class="c-sidebar-nav-icon fas fa-fw fa-tachometer-alt">

                </i>
                {{ trans('global.dashboard') }}
            </a>
        </li>
        @can('user_management_access')
            <li class="c-sidebar-nav-dropdown {{ request()->is("admin/permissions*") ? "c-show" : "" }} {{ request()->is("admin/roles*") ? "c-show" : "" }} {{ request()->is("admin/users*") ? "c-show" : "" }} {{ request()->is("admin/audit-logs*") ? "c-show" : "" }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-users c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.userManagement.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('permission_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.permissions.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/permissions") || request()->is("admin/permissions/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-unlock-alt c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.permission.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('role_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.roles.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/roles") || request()->is("admin/roles/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-briefcase c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.role.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('user_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.users.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/users") || request()->is("admin/users/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-user c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.user.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('audit_log_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.audit-logs.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/audit-logs") || request()->is("admin/audit-logs/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-file-alt c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.auditLog.title') }}
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        @can('user_alert_access')
            <li class="c-sidebar-nav-item">
                <a href="{{ route("admin.user-alerts.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/user-alerts") || request()->is("admin/user-alerts/*") ? "c-active" : "" }}">
                    <i class="fa-fw fas fa-bell c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.userAlert.title') }}
                </a>
            </li>
        @endcan
        @can('manage_competition_access')
            <li class="c-sidebar-nav-dropdown {{ request()->is("admin/competitions*") ? "c-show" : "" }} {{ request()->is("admin/category-competitions*") ? "c-show" : "" }} {{ request()->is("admin/competition-teams*") ? "c-show" : "" }} {{ request()->is("admin/matches*") ? "c-show" : "" }} {{ request()->is("admin/staduims*") ? "c-show" : "" }} {{ request()->is("admin/event-types*") ? "c-show" : "" }} {{ request()->is("admin/match-events*") ? "c-show" : "" }} {{ request()->is("admin/penlities*") ? "c-show" : "" }} {{ request()->is("admin/lineups*") ? "c-show" : "" }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.manageCompetition.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('competition_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.competitions.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/competitions") || request()->is("admin/competitions/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.competition.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('category_competition_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.category-competitions.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/category-competitions") || request()->is("admin/category-competitions/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.categoryCompetition.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('competition_team_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.competition-teams.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/competition-teams") || request()->is("admin/competition-teams/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.competitionTeam.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('match_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.matches.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/matches") || request()->is("admin/matches/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.match.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('staduim_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.staduims.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/staduims") || request()->is("admin/staduims/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.staduim.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('event_type_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.event-types.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/event-types") || request()->is("admin/event-types/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.eventType.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('match_event_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.match-events.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/match-events") || request()->is("admin/match-events/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.matchEvent.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('penlity_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.penlities.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/penlities") || request()->is("admin/penlities/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.penlity.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('lineup_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.lineups.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/lineups") || request()->is("admin/lineups/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.lineup.title') }}
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        @can('category_access')
            <li class="c-sidebar-nav-item">
                <a href="{{ route("admin.categories.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/categories") || request()->is("admin/categories/*") ? "c-active" : "" }}">
                    <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.category.title') }}
                </a>
            </li>
        @endcan
        @can('team_manage_access')
            <li class="c-sidebar-nav-dropdown {{ request()->is("admin/teams*") ? "c-show" : "" }} {{ request()->is("admin/positions*") ? "c-show" : "" }} {{ request()->is("admin/players*") ? "c-show" : "" }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.teamManage.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('team_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.teams.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/teams") || request()->is("admin/teams/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.team.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('position_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.positions.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/positions") || request()->is("admin/positions/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.position.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('player_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.players.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/players") || request()->is("admin/players/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.player.title') }}
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        @can('website_manage_access')
            <li class="c-sidebar-nav-dropdown {{ request()->is("admin/countries*") ? "c-show" : "" }} {{ request()->is("admin/onboardings*") ? "c-show" : "" }} {{ request()->is("admin/newss*") ? "c-show" : "" }} {{ request()->is("admin/banners*") ? "c-show" : "" }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.websiteManage.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('country_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.countries.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/countries") || request()->is("admin/countries/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-flag c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.country.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('onboarding_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.onboardings.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/onboardings") || request()->is("admin/onboardings/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.onboarding.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('news_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.newss.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/newss") || request()->is("admin/newss/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.news.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('banner_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.banners.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/banners") || request()->is("admin/banners/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.banner.title') }}
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        @can('stage_access')
            <li class="c-sidebar-nav-item">
                <a href="{{ route("admin.stages.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/stages") || request()->is("admin/stages/*") ? "c-active" : "" }}">
                    <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.stage.title') }}
                </a>
            </li>
        @endcan
        @can('client_access')
            <li class="c-sidebar-nav-item">
                <a href="{{ route("admin.clients.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/clients") || request()->is("admin/clients/*") ? "c-active" : "" }}">
                    <i class="fa-fw fas fa-user c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.client.title') }}
                </a>
            </li>
        @endcan
        <li class="c-sidebar-nav-item">
            <a href="{{ route("admin.systemCalendar") }}" class="c-sidebar-nav-link {{ request()->is("admin/system-calendar") || request()->is("admin/system-calendar/*") ? "c-active" : "" }}">
                <i class="c-sidebar-nav-icon fa-fw fas fa-calendar">

                </i>
                {{ trans('global.systemCalendar') }}
            </a>
        </li>
        @php($unread = \App\Models\QaTopic::unreadCount())
            <li class="c-sidebar-nav-item">
                <a href="{{ route("admin.messenger.index") }}" class="{{ request()->is("admin/messenger") || request()->is("admin/messenger/*") ? "c-active" : "" }} c-sidebar-nav-link">
                    <i class="c-sidebar-nav-icon fa-fw fa fa-envelope">

                    </i>
                    <span>{{ trans('global.messages') }}</span>
                    @if($unread > 0)
                        <strong>( {{ $unread }} )</strong>
                    @endif

                </a>
            </li>
            @if(file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php')))
                @can('profile_password_edit')
                    <li class="c-sidebar-nav-item">
                        <a class="c-sidebar-nav-link {{ request()->is('profile/password') || request()->is('profile/password/*') ? 'c-active' : '' }}" href="{{ route('profile.password.edit') }}">
                            <i class="fa-fw fas fa-key c-sidebar-nav-icon">
                            </i>
                            {{ trans('global.change_password') }}
                        </a>
                    </li>
                @endcan
            @endif
            <li class="c-sidebar-nav-item">
                <a href="#" class="c-sidebar-nav-link" onclick="event.preventDefault(); document.getElementById('logoutform').submit();">
                    <i class="c-sidebar-nav-icon fas fa-fw fa-sign-out-alt">

                    </i>
                    {{ trans('global.logout') }}
                </a>
            </li>
    </ul>

</div>