{{-- This file is used to store sidebar items, inside the Backpack admin panel --}}
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('dashboard') }}"><i class="la la-home nav-icon"></i> {{ trans('backpack::base.dashboard') }}</a></li>

<li class="nav-item"><a class="nav-link" href="{{ backpack_url('livre') }}"><i class="nav-icon la la-book"></i> Livres</a></li>

<li class="nav-item"><a class="nav-link" href="{{ backpack_url('etudiant') }}"><i class="nav-icon la la-user-graduate"></i> Etudiants</a></li>

<li class="nav-item"><a class="nav-link" href="{{ backpack_url('contact') }}"><i class="nav-icon la la-address-card"></i> Contacts</a></li>
