<?php

// @formatter:off
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App{
/**
 * App\Classroom
 *
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Incustudent[] $student
 */
	class Classroom extends \Eloquent {}
}

namespace App{
/**
 * App\Incuattendance
 *
 */
	class Incuattendance extends \Eloquent {}
}

namespace App{
/**
 * App\Incuincustudentparent
 *
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Incustudent[] $student
 */
	class Incuincustudentparent extends \Eloquent {}
}

namespace App{
/**
 * App\Incushift
 *
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Incustudent[] $student
 */
	class Incushift extends \Eloquent {}
}

namespace App{
/**
 * App\Incustudent
 *
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Incuattendance[] $attendance
 */
	class Incustudent extends \Eloquent {}
}

namespace App{
/**
 * App\Payment
 *
 * @property-read \App\Incustudent $student
 */
	class Incustudentpayment extends \Eloquent {}
}

namespace App{
/**
 * App\Incusubject
 *
 */
	class Incusubject extends \Eloquent {}
}

namespace App{
/**
 * App\Incuteacher
 *
 */
	class Incuteacher extends \Eloquent {}
}

namespace App{
/**
 * App\Level
 *
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Incustudent[] $student
 */
	class Level extends \Eloquent {}
}

namespace App{
/**
 * App\Stuff
 *
 */
	class Stuff extends \Eloquent {}
}

namespace App{
/**
 * App\Superadminbudget
 *
 */
	class Superadminbudget extends \Eloquent {}
}

namespace App{
/**
 * App\User
 *
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Superadminbudget[] $budget
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 */
	class User extends \Eloquent {}
}

namespace App{
/**
 * App\Work
 *
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Incustudent[] $student
 */
	class Work extends \Eloquent {}
}

