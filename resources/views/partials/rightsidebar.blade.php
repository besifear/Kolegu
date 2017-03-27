    <div class="trending-side-bar col-md-12">
      <div class="content-box-header">
        <div class="panel-title">Top Trending</div>
      </div>
      <div class="content-box-large box-with-header">
        <ul class="event-list">
          <li class="questionListItem">
            <div class="info">
              <a  class="title" href="/questions/{{$topquestion->id}}">{{substr($topquestion->title,0,20)}}{{strlen($topquestion->title)>20 ? "..." : ""}}</a>
            </div>
          </li>
        </ul>
      </div>
    </div>
