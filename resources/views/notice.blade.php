<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>Notices</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.1/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.1/dist/js/bootstrap.bundle.min.js"></script>
  <title>Zeal</title>

  <link rel="stylesheet" href="{{ asset('css/home/notice.css') }}">

</head>

<body>

  <div class="container posts-content">


    @if ( $notices->count() > 0 )

    @foreach ($notices as $notice)


    <div class="col-6 mx-auto">
      <div class="card mb-4">
        <div class="card-body">
          <div class="media mb-3">
            <img src="{{ $notice->user->getFirstMediaUrl('profile_picture') }}" class="d-block ui-w-40 rounded-circle" alt="">
            <div class="media-body ml-3">
              {{ $notice->user->name }}
              <div class="text-muted small">{{ date('jS M Y', strtotime($notice->created_at)) }}</div>
            </div>
            <a href="{{ $notice->getFirstMediaUrl('notice') }}" attributes-list target="blank">Download</a>
          </div>

          <p>
            {{ $notice->caption }}
          </p>

          <div class="embed-responsive embed-responsive-1by1">
            <iframe class="embed-responsive-item" src="{{ $notice->getFirstMediaUrl('notice') }}#toolbar=0&navpanes=0&scrollbar=0"></iframe>
          </div>
        </div>
        <div class="card-footer">
          <!-- <a href="javascript:void(0)" class="d-inline-block text-muted">
            <strong>123</strong> Likes</small>
          </a>
          <a href="javascript:void(0)" class="d-inline-block text-muted ml-3">
            <strong>12</strong> Comments</small>
          </a>
          <a href="javascript:void(0)" class="d-inline-block text-muted ml-3">
            <small class="align-middle">Repost</small>
          </a> -->
        </div>
      </div>
    </div>
    <br>
    @endforeach

    @else

    <h1>NO NOTICES</h1>

    @endif



  </div>
</body>

</html>