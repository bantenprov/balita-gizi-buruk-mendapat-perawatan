## balita-gizi-buruk-mendapat-perawatan


[![Join the chat at https://gitter.im/balita-gizi-buruk-mendapat-perawatan/Lobby](https://badges.gitter.im/balita-gizi-buruk-mendapat-perawatan/Lobby.svg)](https://gitter.im/balita-gizi-buruk-mendapat-perawatan/Lobby?utm_source=badge&utm_medium=badge&utm_campaign=pr-badge&utm_content=badge)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/bantenprov/balita-gizi-buruk-mendapat-perawatan/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/bantenprov/balita-gizi-buruk-mendapat-perawatan/?branch=master)
[![Build Status](https://scrutinizer-ci.com/g/bantenprov/balita-gizi-buruk-mendapat-perawatan/badges/build.png?b=master)](https://scrutinizer-ci.com/g/bantenprov/balita-gizi-buruk-mendapat-perawatan/build-status/master)


[![Latest Stable Version](https://poser.pugx.org/bantenprov/balita-gizi-buruk-mendapat-perawatan/v/stable)](https://packagist.org/packages/bantenprov/balita-gizi-buruk-mendapat-perawatan)
[![Total Downloads](https://poser.pugx.org/bantenprov/balita-gizi-buruk-mendapat-perawatan/downloads)](https://packagist.org/packages/bantenprov/balita-gizi-buruk-mendapat-perawatan)
[![Latest Unstable Version](https://poser.pugx.org/bantenprov/balita-gizi-buruk-mendapat-perawatan/v/unstable)](https://packagist.org/packages/bantenprov/balita-gizi-buruk-mendapat-perawatan)
[![License](https://poser.pugx.org/bantenprov/balita-gizi-buruk-mendapat-perawatan/license)](https://packagist.org/packages/bantenprov/balita-gizi-buruk-mendapat-perawatan)
[![Monthly Downloads](https://poser.pugx.org/bantenprov/balita-gizi-buruk-mendapat-perawatan/d/monthly)](https://packagist.org/packages/bantenprov/balita-gizi-buruk-mendapat-perawatan)
[![Daily Downloads](https://poser.pugx.org/bantenprov/balita-gizi-buruk-mendapat-perawatan/d/daily)](https://packagist.org/packages/bantenprov/balita-gizi-buruk-mendapat-perawatan)

Cakupan Balita Gizi Buruk Mendapat Perawatan Menurut Kabupaten/Kota

## install via composer

- Development snapshot
```bash
$ composer require bantenprov/balita-gizi-buruk-mendapat-perawatan:dev-master
```
- Latest release:

```bash
$ composer require bantenprov/balita-gizi-buruk-mendapat-perawatan:v0.1.0
```

## download via github
~~~
bash
$ git clone https://github.com/bantenprov/balita-gizi-buruk-mendapat-perawatan.git
~~~


#### Edit `config/app.php` :
```php

'providers' => [

    /*
    * Laravel Framework Service Providers...
    */
    Illuminate\Auth\AuthServiceProvider::class,
    Illuminate\Broadcasting\BroadcastServiceProvider::class,
    Illuminate\Bus\BusServiceProvider::class,
    Illuminate\Cache\CacheServiceProvider::class,
    Illuminate\Foundation\Providers\ConsoleSupportServiceProvider::class,
    Illuminate\Cookie\CookieServiceProvider::class,
    //....
    Bantenprov\BGBurukPerawatan\BGBurukPerawatanServiceProvider::class,

```

#### Untuk publish component vue :

```bash
$ php artisan vendor:publish --tag=bg-buruk-perawatan-assets
$ php artisan vendor:publish --tag=bg-buruk-perawatan-public
```
#### Tambahkan route di dalam route : `resources/assets/js/routes.js` :

```javascript
path: '/dashboard',
component: layout('Default'),
children: [
  {
    path: '/dashboard',
    components: {
      main: resolve => require(['./components/views/DashboardHome.vue'], resolve),
      navbar: resolve => require(['./components/Navbar.vue'], resolve),
      sidebar: resolve => require(['./components/Sidebar.vue'], resolve)
    },
    meta: {
      title: "Dashboard"
    }
  },
  //== ...
  {
    path: '/dashboard/bg-buruk-perawatan',
    components: {
      main: resolve => require(['./components/views/bantenprov/bg-buruk-perawatan/DashboardBGBurukPerawatan.vue'], resolve),
      navbar: resolve => require(['./components/Navbar.vue'], resolve),
      sidebar: resolve => require(['./components/Sidebar.vue'], resolve)
    },
    meta: {
      title: "Balita Gizi Buruk Mendapat Perawatan"
    }
  }
```

```javascript
{
path: '/admin',
redirect: '/admin/dashboard',
component: resolve => require(['./AdminLayout.vue'], resolve),
children: [
//== ...
    {
      path: '/admin/dashboard/bg-buruk-perawatan',
      components: {
        main: resolve => require(['./components/bantenprov/bg-buruk-perawatan/BGBurukPerawatanAdmin.show.vue'], resolve),
        navbar: resolve => require(['./components/Navbar.vue'], resolve),
        sidebar: resolve => require(['./components/Sidebar.vue'], resolve)
      },
      meta: {
        title: "Balita Gizi Buruk Mendapat Perawatan"
      }
    }
 //== ...   
  ]
},

```
#### Edit menu `resources/assets/js/menu.js`

```javascript
{
  name: 'Dashboard',
  icon: 'fa fa-dashboard',
  childType: 'collapse',
  childItem: [
        {
          name: 'Dashboard',
          link: '/dashboard',
          icon: 'fa fa-angle-double-right'
        },
        {
          name: 'Entity',
          link: '/dashboard/entity',
          icon: 'fa fa-angle-double-right'
        },
        //== ...
        {
          name: 'Balita Gizi Buruk Mendapat Perawatan',
          link: '/dashboard/bg-buruk-perawatan',
          icon: 'fa fa-angle-double-right'
        }
  ]
},
//== ...
        {
          name: 'Balita Gizi Buruk Mendapat Perawatan',
          link: '/admin/dashboard/bg-buruk-perawatan',
          icon: 'fa fa-angle-double-right'
        },
```

#### Tambahkan components `resources/assets/js/components.js` :

```javascript

import BGBurukPerawatan from './components/bantenprov/bg-buruk-perawatan/BGBurukPerawatan.chart.vue';
Vue.component('echarts-bg-buruk-perawatan', BGBurukPerawatan);

import BGBurukPerawatanKota from './components/bantenprov/bg-buruk-perawatan/BGBurukPerawatanKota.chart.vue';
Vue.component('echarts-bg-buruk-perawatan-kota', BGBurukPerawatanKota);

import BGBurukPerawatanTahun from './components/bantenprov/bg-buruk-perawatan/BGBurukPerawatanTahun.chart.vue';
Vue.component('echarts-bg-buruk-perawatan-tahun', BGBurukPerawatanTahun);

import BGBurukPerawatanAdminShow from './components/bantenprov/bg-buruk-perawatan/BGBurukPerawatanAdmin.show.vue';
Vue.component('admin-view-bg-buruk-perawatan-tahun', BGBurukPerawatanAdminShow);

//== Echarts Balita Gizi Buruk Mendapat Perawatan

import BGBurukPerawatanBar01 from './components/views/bantenprov/bg-buruk-perawatan/BGBurukPerawatanBar01.vue';
Vue.component('bg-buruk-perawatan-bar-01', BGBurukPerawatanBar01);

import BGBurukPerawatanBar02 from './components/views/bantenprov/bg-buruk-perawatan/BGBurukPerawatanBar02.vue';
Vue.component('bg-buruk-perawatan-bar-02', BGBurukPerawatanBar02);

//== mini bar charts
import BGBurukPerawatanBar03 from './components/views/bantenprov/bg-buruk-perawatan/BGBurukPerawatanBar03.vue';
Vue.component('bg-buruk-perawatan-bar-03', BGBurukPerawatanBar03);

import BGBurukPerawatanPie01 from './components/views/bantenprov/bg-buruk-perawatan/BGBurukPerawatanPie01.vue';
Vue.component('bg-buruk-perawatan-pie-01', BGBurukPerawatanPie01);

import BGBurukPerawatanPie02 from './components/views/bantenprov/bg-buruk-perawatan/BGBurukPerawatanPie02.vue';
Vue.component('bg-buruk-perawatan-pie-02', BGBurukPerawatanPie02);

//== mini pie charts
import BGBurukPerawatanPie03 from './components/views/bantenprov/bg-buruk-perawatan/BGBurukPerawatanPie03.vue';
Vue.component('bg-buruk-perawatan-pie-03', BGBurukPerawatanPie03);
```
