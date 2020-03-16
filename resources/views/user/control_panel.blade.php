@extends('layouts.app') @section('content')

<div class="container white-bg">
    <div class="columns">
        <div class="column is-4">
            <button class="button is-link is-medium">
                <span class="icon">
            <i class="fas fa-pen"></i>
          </span>
                <span>Create post</span>
            </button>
        </div>

    </div>
    <div class="tabs is-boxed is-centered is-medium">
        <ul>
            <li class="is-active current-tab" id="settings_tab" onclick="change_tab('settings_content','settings_tab');">
                <a>
                    <span class="icon is-small"><i class="fas fa-cog" aria-hidden="true"></i></span>
                    <span>Settings</span>
                </a>
            </li>
 
            <li id="design_tab" onclick="change_tab('design_content','design_tab');">
                <a>
                    <span class="icon is-small"><i class="fas fa-paint-brush" aria-hidden="true"></i></span>
                    <span>Design</span>
                </a>
            </li>

            <li id="users_tab" onclick="change_tab('users_content','users_tab');">
              <a>
                  <span class="icon is-small"><i class="fas fa-user" aria-hidden="true"></i></span>
                  <span>Users</span>
              </a>
          </li>

            <li>
                <a>
                    <span class="icon is-small"><i class="far fa-file-alt" aria-hidden="true"></i></span>
                    <span>~</span>
                </a>
            </li>
        </ul>
    </div>

    <div id="settings_content" class="current-content">
        
    <div class="columns">
        <div class="column is-12 has-text-centered">
            <span class="icon">
        <i class="fas fa-cog"></i>
      </span>
            <h3 class="subtitle">Web-site general settings</h3>

            <form action="control/update_settings" method="POST">
                @csrf
                <div class="field is-horizontal">
                    <div class="field-label is-normal">
                        <label class="label">Site title</label>
                    </div>
                    <div class="field-body">
                        <div class="field">
                            <p class="control is-expanded">
                                <input class="input" name="site_title" type="text" required placeholder="Web-site name" value="{{$settings->site_title}}">
                            </p>
                        </div>
                    </div>
                </div>

                <div class="field is-horizontal">
                    <div class="field-label is-normal">
                        <label class="label">Site subtitle</label>
                    </div>
                    <div class="field-body">
                        <div class="field">
                            <p class="control is-expanded">
                                <input class="input" name="site_subtitle" type="text" required placeholder="Subtitle" value="{{$settings->site_subtitle}}">
                            </p>
                        </div>
                    </div>
                </div>

                <div class="field is-horizontal">
                  <div class="field-label is-normal">
                      <label class="label">Contact E-Mail</label>
                  </div>
                  <div class="field-body">
                      <div class="field">
                          <p class="control is-expanded">
                              <input class="input" name="contact_email" type="email" required placeholder="example@yourmail.com" value="{{$settings->contact_email}}">
                          </p>
                      </div>
                  </div>
              </div>

                <div class="field is-horizontal">
                    <div class="field-label">
                        <!-- Left empty for spacing -->
                    </div>
                    <div class="field-body">
                        <div class="field">
                            <div class="control">
                                <button type="submit" class="button is-link">
                                    <span class="icon">
                  <i class="fas fa-save"></i>
                </span>
                                    <span>
                  Save
                </span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    

    <div class="columns">
        <div class="column is-12 has-text-centered">
            <span class="icon">
        <i class="fas fa-link"></i>
      </span>
            <h3 class="subtitle">Social media (Links)</h3> @php $count = 0; @endphp
            <form id="form_social" action="control/update_social/" method="POST">
                @csrf @foreach($social_media as $item)
                <div class="field is-horizontal" id="soc-media-field-{{$count}}">

                    <div class="field-label is-normal">
                        <label class="label"># {{$count+1}}</label>
                    </div>
                    <div class="field-body">
                        <div class="field">
                            <input class="input invisible" type="text" name="id_{{$count}}" value="{{$item->id}}">
                            <input class="input" type="text" placeholder="Web-site (or social media platform) name" name="platform_{{$count}}" maxlength="20" value="{{$item->platform_name}}">

                        </div>
                        <div class="field">
                            <input class="input" type="url" placeholder="https://web-site.com" name="url_{{$count}}" value="{{$item->url}}">
                        </div>
                    </div>
                </div>

                @php $count += 1; @endphp @endforeach

                <!--govnokod alert-->
                <!-- в элементе num_of_fields сохраняем количество полей для соцсетей, чтобы передать это значение при отправке формы -->
                <!-- при добавлении нового поля делаем +1 при помощи jQuery -->
                <div id="num_of_fields" class="invisible">{{$count}}</div>
                <div class="field is-horizontal">
                    <div class="field-label">
                        <!-- Left empty for spacing -->
                    </div>
                    <div class="field-body">
                        <div class="field">
                            <div class="control">
                                <button type="submit" class="button is-link">
                                    <span class="icon">
                  <i class="fas fa-save"></i>
                </span>
                                    <span>
                  Save
                </span>
                                </button>
                            </div>
                        </div>

                    </div>
                </div>
            </form>
        </div>
    </div>

    </div>

    <div id="users_content" class="invisible">
        <div class="columns">
            <h1>users</h1>    
        </div>
      
    </div>



</div>

@endsection @push('scripts')
<script src="{{ asset('js/control_panel.js') }}"></script>
@endpush