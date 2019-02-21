@extends('marketplace.layouts.app')
@section('title', 'Dashboard')
@section('content')
<div class="dash-page">
    <div class="menu-top">
        <div class="header-top d-flex ">
            <div class="logo">
                <img src="images/logo copy 12.png" />
            </div>
            <div class="top-menu d d-flex justify-content-end ">
                <ul>
                    <li><a href="javascript:void(0)">Blog</a></li>
                    <li><a href="javascript:void(0)">About</a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="sub-menu">
        <nav class="navbar navbar-expand-md navbar-dark">
            <div class="secondary-menu">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="collapsibleNavbar">
                    <ul class="navbar-nav">
                        <li class="nav-item active">
                            <a class="nav-link" href="#">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Your Intrastructure</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Technology</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Solutions</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Community</a>
                        </li>
                    </ul>
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="#">187...com</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Exit</a>
                        </li>

                    </ul>
                </div>
            </div>
        </nav>
    </div>
    <div class="content d-flex justify-content-center">
        <div class="side-menu d-flex flex-row">
            <div class="flex-column">
                <h2>Buy</h2>
                <ul>
                    <li>
                        <a href="#">Choose server hosting</a>
                    </li>
                    <li>
                        <a href="#">Choose your server image</a>
                    </li>
                    <li>
                        <a href="#">Choose your ledger network</a>
                    </li>
                    <li>
                        <a href="#">Choose your security services</a>
                    </li>
                </ul>
            </div>
            <div class="d-flex flex-row billing">
                <div class="flex-column">
                    <label class="">Billing</label>
                    <table >
                        <tbody>
                            <tr>
                                <td>Current billing rate</td>
                                <td>$1,070 / month</td>
                            </tr>
                            <tr>
                                <td>Next invoice</td>
                                <td>$570 on Dec 15</td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="pay-btn d-flex">
                        <button>Invoice</button>
                        <button class="active">Payments</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="intra-page">
            <div class="title-header">
                <label>Your infrastructure</label>
                <img src="images/warn 2.png" />
            </div>
            <div class="intra-details">
                <table>
                    <tbody>
                        <tr>
                            <th>Servers</th>
                            <th>Storage utilization</th>
                            <th>RAM utilization</th>
                            <th>Security status</th>
                        </tr>
                        <tr>

                        </tr>
                        <tr class="details">
                            <td>server1.rootowl.com</td>
                            <td>
                                <div class="progress">
                                    <div class="progress-bar"></div>
                                </div>
                                <label>60GB</label>
                            </td>
                            <td>
                                <div class="progress">
                                    <div class="progress-bar"></div>
                                </div>
                                <label>60GB</label>
                            </td>
                            <td><div class=""><img src="images/shield.png" /></div></td>
                        </tr>
                        <tr class="details">
                            <td>server1.rootowl.com</td>
                            <td>
                                <div class="progress">
                                    <div class="progress-bar"></div>
                                </div>
                                <label>60GB</label>
                            </td>
                            <td>
                                <div class="progress">
                                    <div class="progress-bar"></div>
                                </div>
                                <label>60GB</label>
                            </td>
                            <td><div class=""><img src="images/shield.png" /></div></td>
                        </tr>
                        <tr class="details">
                            <td>server1.rootowl.com</td>
                            <td>
                                <div class="progress">
                                    <div class="progress-bar"></div>
                                </div>
                                <label>60GB</label>
                            </td>
                            <td>
                                <div class="progress">
                                    <div class="progress-bar"></div>
                                </div>
                                <label>60GB</label>
                            </td>
                            <td><div class=""><img src="images/danger.png" /></div></td>
                        </tr>
                        <tr class="details">
                            <td>server1.rootowl.com</td>
                            <td>
                                <div class="progress">
                                    <div class="progress-bar"></div>
                                </div>
                                <label>60GB</label>
                            </td>
                            <td>
                                <div class="progress">
                                    <div class="progress-bar"></div>
                                </div>
                                <label>60GB</label>
                            </td>
                            <td><div class=""><img src="images/shield.png" /></div></td>
                        </tr>
                        <tr class="details">
                            <td>server1.rootowl.com</td>
                            <td>
                                <div class="progress">
                                    <div class="progress-bar"></div>
                                </div> <label>60GB</label>
                            </td>
                            <td>
                                <div class="progress">
                                    <div class="progress-bar"></div>
                                </div>
                                <label>60GB</label>
                            </td>
                            <td><div class=""><img src="images/shield.png" /></div></td>
                        </tr>
                    </tbody>
                </table>
                <div class="pagination d-flex justify-content-center">
                    <ul>
                        <li><label>up</label></li>
                        <li><img src="images/ic_up2 copy 6.png" /></li>
                        <li><img src="images/3.png" /></li>
                        <li><img src="images/ic_next copy 3.png" /></li>
                        <li><label class="active">next</label></li>
                    </ul>
                </div>
                <div class="guide">
                    <label>launch cool, secure app in minutes. Check our templates and guides</label>
                </div>
                <div class="launch_cool">
                    <div class="d-flex justify-content-center">
                        <div class="box2">
                            <a href="javascript:void(0)">
                                <img src="images/vpn监控.png" />
                            </a>
                            <p>Launch a hardened VPS</p>
                        </div>
                        <div class="box2">
                            <a href="javascript:void(0)">
                                <img src="images/Shape 2.png" />
                            </a>
                            <p>Secure your data
                    in the cloud</p>
                        </div>
                        <div class="box2">
                            <a href="javascript:void(0)">
                                <img src="images/Group 16.png" />
                            </a>
                            <p>Sell with
                    confidence</p>
                        </div>
                        <div class="box2">
                            <a href="javascript:void(0)">
                                <img src="images/android-logo.png" />
                            </a>
                            <p>Build a secure app backend</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
