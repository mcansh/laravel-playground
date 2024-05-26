<h2>Your job posting has been approved!</h2>

<p>Congrats! Your job is now live on our website.</p>

<p>
    View your job posting here:
    <a href="{{ url(route("jobs.show", $job)) }}">
        {{ route("jobs.show", $job) }}
    </a>
</p>
