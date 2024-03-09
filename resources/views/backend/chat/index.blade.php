@extends('layouts.app')

@section('content')
<div class="app-content content chat-application ">
    <div class="sidebar-left">
        <div class="sidebar">
            <!-- app chat user profile left sidebar start -->
            <div class="chat-user-profile">
                <header class="chat-user-profile-header text-center border-bottom">
                    <span class="chat-profile-close">
                        <i class="ft-x"></i>
                    </span>
                    <div class="my-2">

                        <img src="../../../app-assets/images/portrait/small/avatar-s-11.png" class="round mb-1" alt="user_avatar" height="100" width="100">

                        <h5 class="mb-0">{{ $user->name }}</h5>
                        <span>{{$role[0]}}</span>
                    </div>
                </header>
                <div class="chat-user-profile-content">
                    <div class="chat-user-profile-scroll">
                        <h6 class="text-uppercase mb-1">ABOUT</h6>
                        <p class="mb-2">It is a long established fact that a reader will be distracted by the readable content .</p>
                        <h6>PERSONAL INFORAMTION</h6>
                        <ul class="list-unstyled mb-2">
                            <li class="mb-25">{{$user->email}}</li>
                            {{-- <li>{{$user->client->reg_no}}</li> --}}
                        </ul>
                    </div>
                </div>
            </div>
            <!-- app chat user profile left sidebar ends -->
            <!-- app chat sidebar start -->
            <div class="chat-sidebar card">
                <span class="chat-sidebar-close">
                    <i class="ft-x"></i>
                </span>
                <div class="chat-sidebar-search">
                    <div class="d-flex align-items-center">
                        <div class="chat-sidebar-profile-toggle">
                            <div class="avatar">
                                <img src="../../../app-assets/images/portrait/small/avatar-s-11.png" class="cursor-pointer" alt="user_avatar" height="36" width="36">
                            </div>
                        </div>
                        <fieldset class="form-group position-relative has-icon-left mx-75 mb-0">
                            <input type="text" class="form-control round" id="chat-search" placeholder="Search">
                            <div class="form-control-position">
                                <i class="ft-search text-dark"></i>
                            </div>
                        </fieldset>
                    </div>
                </div>
                <div class="chat-sidebar-list-wrapper pt-2">
                    <h6 class="px-2 pt-2 pb-25 mb-0">CHATS</h6>
                    <ul class="chat-sidebar-list">
                        @role('Admin')
                        @foreach ($chats as $chat)
                            <li data-id="{{ $chat->user_id }}">
                                <div class="d-flex align-items-center">
                                    <div class="avatar m-0 mr-50"><img src="../../../app-assets/images/portrait/small/avatar-s-26.png" height="36" width="36" alt="sidebar user image">
                                        <span class="avatar-status-busy"></span>
                                    </div>
                                    <div class="chat-sidebar-name">
                                        <h6 class="mb-0">{{$chat->user->name}}</h6><span class="text-muted">Student</span>
                                    </div>
                                </div>
                            </li>

                        @endforeach
                        @endrole

                        @role('Student')
                        @foreach ($chats as $chat)
                            <li data-id="{{ $chat->recipient_id }}">
                                <div class="d-flex align-items-center">
                                    <div class="avatar m-0 mr-50"><img src="../../../app-assets/images/portrait/small/avatar-s-26.png" height="36" width="36" alt="sidebar user image">
                                        <span class="avatar-status-busy"></span>
                                    </div>
                                    <div class="chat-sidebar-name">
                                        <h6 class="mb-0">{{$chat->recipient->name}}</h6><span class="text-muted">Admin</span>
                                    </div>
                                </div>
                            </li>

                        @endforeach
                        @endrole
                    </ul>
                    <h6 class="px-2 pt-2 pb-25 mb-0">CONTACTS</h6>
                    <ul class="chat-sidebar-list">
                        @foreach ($contacts as $contact)
                            <li data-id="{{$contact->id}}">
                                <div class="d-flex align-items-center">
                                    <div class="avatar m-0 mr-50"><img src="../../../app-assets/images/portrait/small/avatar-s-8.png" height="36" width="36" alt="sidebar user image">
                                        <span class="avatar-status-away"></span>
                                    </div>
                                    <div class="chat-sidebar-name">
                                        <h6 class="mb-0">{{$contact->name}}</h6><span class="text-muted"> Admin</span>
                                    </div>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <!-- app chat sidebar ends -->

        </div>
    </div>
    <div class="content-right">
        <div class="content-overlay"></div>
        <div class=" ">
            {{-- <div class="content-header row">
            </div> --}}
            <div class="content-body chat-mine">
                <!-- app chat overlay -->
                <div class="chat-overlay"></div>
                <!-- app chat window start -->
                <section class="chat-window-wrapper">
                    <div class="chat-start">
                        <span class="ft-message-square chat-sidebar-toggle chat-start-icon font-large-3 p-3 mb-1"></span>
                        <h4 class="d-none d-lg-block py-50 text-bold-500">Select a contact to start a chat!</h4>
                        <button class="btn btn-light-primary chat-start-text chat-sidebar-toggle d-block d-lg-none py-50 px-1">Start
                            Conversation!</button>
                    </div>
                    <div class="chat-area d-none">
                        <div class="chat-header">
                            <header class="d-flex justify-content-between align-items-center px-1 py-75">
                                <div class="d-flex align-items-center">
                                    <div class="chat-sidebar-toggle d-block d-lg-none mr-1"><i class="ft-align-justify font-large-1 cursor-pointer"></i>
                                    </div>
                                    <div class="avatar chat-profile-toggle m-0 mr-1">
                                        <img src="../../../app-assets/images/portrait/small/avatar-s-26.png" class="cursor-pointer" alt="avatar" height="36" width="36" />
                                        <span class="avatar-status-busy"></span>
                                    </div>
                                    <h6 class="mb-0" id="recipient_name">Elizabeth Eseslliott</h6>
                                </div>
                            </header>
                        </div>
                        <!-- chat card start -->
                        <div class="card chat-wrapper shadow-none mb-0">
                            <div class="card-content">
                                <div class="card-body chat-container">
                                    <div class="chat-content ">
                                        <div class="chat">
                                            <div class="chat-avatar">
                                                <a class="avatar m-0">
                                                    <img src="../../../app-assets/images/portrait/small/avatar-s-11.png" alt="avatar" height="36" width="36" />
                                                </a>
                                            </div>
                                            <div class="chat-body">
                                                <div class="chat-message">
                                                    <p>How can we help? We're here for you! 😄</p>
                                                    <span class="chat-time">7:45 AM</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="chat chat-left">
                                            <div class="chat-avatar">
                                                <a class="avatar m-0">
                                                    <img src="../../../app-assets/images/portrait/small/avatar-s-26.png" alt="avatar" height="36" width="36" />
                                                </a>
                                            </div>
                                            <div class="chat-body">
                                                <div class="chat-message">
                                                    <p>Hey John, I am looking for the best admin template.</p>
                                                    <p>Could you please help me to find it out? 🤔</p>
                                                    <span class="chat-time">7:50 AM</span>
                                                </div>
                                                <div class="chat-message">
                                                    <p>It should be Bootstrap 4 🤩 compatible.</p>
                                                    <span class="chat-time">7:58 AM</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="badge badge-pill badge-light-secondary my-1">Yesterday</div>
                                        <div class="chat">
                                            <div class="chat-avatar">
                                                <a class="avatar m-0">
                                                    <img src="../../../app-assets/images/portrait/small/avatar-s-11.png" alt="avatar" height="36" width="36" />
                                                </a>
                                            </div>
                                            <div class="chat-body">
                                                <div class="chat-message">
                                                    <p>Absolutely!</p>
                                                    <span class="chat-time">8:00 AM</span>
                                                </div>
                                                <div class="chat-message">
                                                    <p>modern admin is the responsive bootstrap 4 admin template.</p>
                                                    <span class="chat-time">8:01 AM</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="chat chat-left">
                                            <div class="chat-avatar">
                                                <a class="avatar m-0">
                                                    <img src="../../../app-assets/images/portrait/small/avatar-s-26.png" alt="avatar" height="36" width="36" />
                                                </a>
                                            </div>
                                            <div class="chat-body">
                                                <div class="chat-message">
                                                    <p>Looks clean and fresh UI. 😃</p>
                                                    <span class="chat-time">10:12 AM</span>
                                                </div>
                                                <div class="chat-message">
                                                    <p>It's perfect for my next project.</p>
                                                    <span class="chat-time">10:15 AM</span>
                                                </div>
                                                <div class="chat-message">
                                                    <p>How can I purchase 🤑 it?</p>
                                                    <span class="chat-time">10:18 AM</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="chat">
                                            <div class="chat-avatar">
                                                <a class="avatar m-0">
                                                    <img src="../../../app-assets/images/portrait/small/avatar-s-11.png" alt="avatar" height="36" width="36" />
                                                </a>
                                            </div>
                                            <div class="chat-body">
                                                <div class="chat-message">
                                                    <p>Thanks 🤝 , from ThemeForest.</p>
                                                    <span class="chat-time">10:20 AM</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="chat chat-left">
                                            <div class="chat-avatar">
                                                <a class="avatar m-0">
                                                    <img src="../../../app-assets/images/portrait/small/avatar-s-26.png" alt="avatar" height="36" width="36" />
                                                </a>
                                            </div>
                                            <div class="chat-body">
                                                <div class="chat-message">
                                                    <p>I will purchase it for sure. 👍</p>
                                                    <span class="chat-time">3:32 PM</span>
                                                </div>
                                                <div class="chat-message">
                                                    <p>Thanks.</p>
                                                    <span class="chat-time">3:33 PM</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer chat-footer px-2 py-1 pb-0">
                                <form class="d-flex align-items-center" onsubmit="chatMessagesSend();" action="javascript:void(0);">
                                    <i class="ft-user cursor-pointer"></i>
                                    <i class="ft-paperclip ml-1 cursor-pointer"></i>
                                    <input type="hidden" name="selected_chat" id="selected_chat" value="">
                                    <input type="text" id="message_input" class="form-control chat-message-send mx-1" placeholder="Type your message here...">
                                    <button type="submit" class="btn btn-primary glow send d-lg-flex"><i class="ft-play"></i>
                                        <span class="d-none d-lg-block mx-50">Send</span></button>
                                </form>
                            </div>
                        </div>
                        <!-- chat card ends -->
                    </div>
                </section>
                <!-- app chat window ends -->
                <!-- app chat profile right sidebar start -->
                <section class="chat-profile">
                    <header class="chat-profile-header text-center border-bottom">
                        <span class="chat-profile-close">
                            <i class="ft-x"></i>
                        </span>
                        <div class="my-2">

                            <img src="../../../app-assets/images/portrait/small/avatar-s-26.png" class="round mb-1" alt="chat avatar" height="100" width="100">

                            <h5 class="app-chat-user-name mb-0">Elizabeth Elliott</h5>
                            <span>Devloper</span>
                        </div>
                    </header>
                    <div class="chat-profile-content p-2">
                        <h6 class="mt-1">ABOUT</h6>
                        <p>It is a long established fact that a reader will be distracted by the readable content.</p>
                        <h6 class="mt-2">PERSONAL INFORMATION</h6>
                        <ul class="list-unstyled">
                            <li class="mb-25">email@gmail.com</li>
                            <li>+1(789) 950-7654</li>
                        </ul>
                    </div>
                </section>
                <!-- app chat profile right sidebar ends -->

            </div>
        </div>
    </div>
</div>
@endsection
