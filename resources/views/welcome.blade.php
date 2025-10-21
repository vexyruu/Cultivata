<!DOCTYPE html>
<html lang="en">
<head>
    @include('partials.head')
</head>
<body class="min-h-screen bg-white dark:bg-zinc-800">
    <flux:header container class="py-2 bg-zinc-50 dark:bg-zinc-900 border-b border-zinc-200 dark:border-zinc-700">
        <flux:sidebar.toggle class="lg:hidden" icon="bars-2" inset="left" />
        <flux:brand href="#" :logo="asset('icon/cultivata.png')" name="Cultivata" />
        <flux:navbar class="-mb-px max-lg:hidden">
            <flux:navbar.item icon="home" href="#" current>Home</flux:navbar.item>
        </flux:navbar>
        <flux:spacer />
        <div class="flex items-center gap-2">
            <flux:button variant="primary" color="green" href="{{route('login')}}">Login</flux:button>
            <flux:button href="{{route('register') ?? '#'}}">Register</flux:button>
        </div>
    </flux:header>
    <flux:main container>
        <div class="py-16 md:py-24 grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">

            <div class="text-left lg:row-start-1">
                <flux:heading size="xl" level="1" class="max-w-3xl text-5xl lg:text-5xl">
                    Grow, track, and harvest your urban garden with ease.
                </flux:heading>
                <flux:text class="mt-4 mb-8 text-lg max-w-2xl text-zinc-600 dark:text-zinc-300">
                    Cultivata is your all-in-one urban farming planner. Manage your plants, track progress, and connect
                    with a community of growers. Start your garden today!
                </flux:text>
                <div class="flex items-center justify-start gap-4">
                    <flux:button variant="primary" color="green" href="{{route('register') ?? '#'}}">
                        Get Started Free
                    </flux:button>
                </div>
            </div>
            <div class="flex items-center justify-center row-start-1 lg:row-start-1">
                <img src="https://images.unsplash.com/photo-1621460249485-4e4f92c9de5d?ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&q=80&w=687"
                    class="rounded-lg shadow-lg w-full max-w-md h-auto object-cover aspect-[4/5]" />
            </div>
        </div>
    </flux:main>
    @fluxScripts
</body>
</html>