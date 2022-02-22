<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-right image">
          <img src="/manage/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>محمد شریفی</p>
          <a href="#"><i class="fa fa-circle text-success"></i> آنلاین</a>
        </div>
      </div>
      <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="جستوجو ...">
          <span class="input-group-btn">
            <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button>
          </span>
        </div>
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="header">ناوبری اصلی</li>
       
        <li class="treeview {{ url()->current() == route('admin.services.create')  ? 'active' : ''  }} {{ url()->current() == route('admin.services.index')  ? 'active' : ''  }}">
          <a href="#">
            <i class="fa fa-files-o"></i>
            <span>الخدمات</span>
            <span class="label label-primary pull-left">{{App\Models\Service::count()}}</span>
          </a>
          <ul class="treeview-menu">
            <li class="{{ url()->current() == route('admin.services.create') ? 'active' : '' }}" ><a href="{{route('admin.services.create')}}"><i class="fa fa-circle-o"></i> إنشاء خدمة</a></li>
            <li class="{{ url()->current() == route('admin.services.index') ? 'active' : '' }}" ><a href="{{route('admin.services.index')}}"><i class="fa fa-circle-o"></i> عرض الكل</a></li>
          </ul>
        </li>

        <li class="treeview {{ url()->current() == route('admin.contacts.index')  ? 'active' : ''  }}">
          <a href="#">
            <i class="fa fa-files-o"></i>
            <span>الاتصال</span>
            <span class="label label-primary pull-left">{{App\Models\Contact::count()}}</span>
          </a>
          <ul class="treeview-menu">
            <li class="{{ url()->current() == route('admin.contacts.index') ? 'active' : '' }}" ><a href="{{route('admin.contacts.index')}}"><i class="fa fa-circle-o"></i> عرض الكل</a></li>
          </ul>
        </li>

        <li class="treeview {{ url()->current() == route('admin.photos.create')  ? 'active' : ''  }} {{ url()->current() == route('admin.photos.index')  ? 'active' : ''  }}">
          <a href="#">
            <i class="fa fa-files-o"></i>
            <span>معرض الصور</span>
            <span class="label label-primary pull-left">{{App\Models\ParentPhoto::count()}}</span>
          </a>
          <ul class="treeview-menu">
            <li class="{{ url()->current() == route('admin.photos.create') ? 'active' : '' }}" ><a href="{{route('admin.photos.create')}}"><i class="fa fa-circle-o"></i> انشاء صور</a></li>
            <li class="{{ url()->current() == route('admin.photos.index') ? 'active' : '' }}" ><a href="{{route('admin.photos.index')}}"><i class="fa fa-circle-o"></i> عرض الكل</a></li>
          </ul>
        </li>

        <li class="treeview {{ url()->current() == route('admin.custmores.create')  ? 'active' : ''  }} {{ url()->current() == route('admin.custmores.index')  ? 'active' : ''  }}">
          <a href="#">
            <i class="fa fa-files-o"></i>
            <span>العملاء</span>
            <span class="label label-primary pull-left">{{App\Models\Custmore::count()}}</span>
          </a>
          <ul class="treeview-menu">
            <li class="{{ url()->current() == route('admin.custmores.create') ? 'active' : '' }}" ><a href="{{route('admin.custmores.create')}}"><i class="fa fa-circle-o"></i> انشاء عميل</a></li>
            <li class="{{ url()->current() == route('admin.custmores.index') ? 'active' : '' }}" ><a href="{{route('admin.custmores.index')}}"><i class="fa fa-circle-o"></i> عرض الكل</a></li>
          </ul>
        </li>

        <li class="treeview {{ url()->current() == route('admin.site.settings.create')  ? 'active' : ''  }} {{ url()->current() == route('admin.site.settings.index')  ? 'active' : ''  }}">
          <a href="#">
            <i class="fa fa-files-o"></i>
            <span>اعدادات الموقع</span>
            <span class="label label-primary pull-left">{{App\Models\SiteSetting::count()}}</span>
          </a>
          <ul class="treeview-menu">
            <li hidden class="{{ url()->current() == route('admin.site.settings.create') ? 'active' : '' }}" ><a href="{{route('admin.site.settings.create')}}"><i class="fa fa-circle-o"></i> انشاء </a></li>
            <li  class="{{ url()->current() == route('admin.site.settings.index') ? 'active' : '' }}" ><a href="{{route('admin.site.settings.index')}}"><i class="fa fa-circle-o"></i> عرض الكل</a></li>
          </ul>
        </li>

        <li class="treeview {{ url()->current() == route('admin.site.services.create')  ? 'active' : ''  }} {{ url()->current() == route('admin.site.services.index')  ? 'active' : ''  }}">
          <a href="#">
            <i class="fa fa-files-o"></i>
            <span>خدمات الموقع</span>
            <span class="label label-primary pull-left">{{App\Models\SiteService::count()}}</span>
          </a>
          <ul class="treeview-menu">
            <li   class="{{ url()->current() == route('admin.site.services.create') ? 'active' : '' }}"><a href="{{route('admin.site.services.create')}}"><i class="fa fa-circle-o"></i> انشاء </a></li>
            <li class="{{ url()->current() == route('admin.site.services.index') ? 'active' : '' }}" ><a href="{{route('admin.site.services.index')}}"><i class="fa fa-circle-o"></i> عرض الكل</a></li>
          </ul>
        </li>

        <li class="treeview {{ url()->current() == route('admin.managements.create')  ? 'active' : ''  }} {{ url()->current() == route('admin.managements.index')  ? 'active' : ''  }}">
          <a href="#">
            <i class="fa fa-files-o"></i>
            <span>الاداره</span>
            <span class="label label-primary pull-left">{{App\Models\Admin::count()}}</span>
          </a>
          <ul class="treeview-menu">
            <li class="{{ url()->current() == route('admin.managements.create') ? 'active' : '' }}" ><a href="{{route('admin.managements.create')}}"><i class="fa fa-circle-o"></i> انشاء </a></li>
            <li class="{{ url()->current() == route('admin.managements.index') ? 'active' : '' }}" ><a href="{{route('admin.managements.index')}}"><i class="fa fa-circle-o"></i> عرض الكل</a></li>
          </ul>
        </li>

        <li class="treeview {{ url()->current() == route('admin.sliders.create')  ? 'active' : ''  }} {{ url()->current() == route('admin.sliders.index')  ? 'active' : ''  }}">
          <a href="#">
            <i class="fa fa-files-o"></i>
            <span>صور slider</span>
            <span class="label label-primary pull-left">{{App\Models\Slider::count()}}</span>
          </a>
          <ul class="treeview-menu">
            <li class="{{ url()->current() == route('admin.sliders.create') ? 'active' : '' }}" ><a href="{{route('admin.sliders.create')}}"><i class="fa fa-circle-o"></i> انشاء </a></li>
            <li class="{{ url()->current() == route('admin.sliders.index') ? 'active' : '' }}" ><a href="{{route('admin.sliders.index')}}"><i class="fa fa-circle-o"></i> عرض الكل</a></li>
          </ul>
        </li>


        <li class="treeview {{ url()->current() == route('admin.Subscribes.index')  ? 'active' : ''  }}">
          <a href="#">
            <i class="fa fa-files-o"></i>
            <span>الاشتراك</span>
            <span class="label label-primary pull-left">{{App\Models\Subscribe::count()}}</span>
          </a>
          <ul class="treeview-menu">
            <li class="{{ url()->current() == route('admin.Subscribes.index') ? 'active' : '' }}" ><a href="{{route('admin.Subscribes.index')}}"><i class="fa fa-circle-o"></i> عرض الكل</a></li>
          </ul>
        </li>

       

      
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>