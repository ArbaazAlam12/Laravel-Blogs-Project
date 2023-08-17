<div>
        <!-- product section -->
        <div style="padding-left: 100px;  margin-bottom: 30px; margin-top: 40px; text-align: center">
                <input wire:model.debounce.300ms="search" style="height: 40px; width: 600px; border-radius: 5px" type="text" style="color: black" placeholder="   Search any blog......" >
          </div>
          <div style="text-align:center; display: flex; justify-content: center; width:1200px; padding-left:450px">
            <div class="relative w-1/5 ml-auto mr-auto h-1/">
                <div class="dropdown">
                    <button style="width: 200px;  background: black; color: white; opacity: 0.8" class="btn btn-dark dropdown-toggle"
                            type="button"
                            id="multiSelectDropdown"
                            data-bs-toggle="dropdown"
                            aria-expanded="false">
                        Author
                    </button>
                    <ul class="dropdown-menu"
                        aria-labelledby="multiSelectDropdown">
                        @foreach ($posts->unique('author') as $post)
                        <li>
                          <label>
                            <input wire:model.debounce.400ms="author" style="margin-left: 10px" type="checkbox"
                                   value="{{ $post->author }}">
                                   {{ $post->author }}
                            </label>
                        </li>
                        @endforeach
                    </ul>
                </div>

            </div>
            <div class="relative w-1/6 ml-auto mr-auto">
                <div class="dropdown">
                    <button style="width: 200px;  background: black; color: white; opacity: 0.8" class="btn btn-dark dropdown-toggle"
                            type="button"
                            id="multiSelectDropdown"
                            data-bs-toggle="dropdown"
                            aria-expanded="false">
                        Category
                    </button>
                    <ul class="dropdown-menu"
                        aria-labelledby="multiSelectDropdown">
                        @foreach ($posts->unique('category') as $post)
                        <li>
                          <label>
                            <input wire:model.debounce.400ms="category" style="margin-left: 10px" type="checkbox"
                                   value="{{$post->category }}">
                                  {{ $post->category }}
                            </label>
                        </li>
                        @endforeach

                    </ul>
                </div>

            </div>
            <div class="relative w-1/6 ml-auto mr-auto">
                <div class="dropdown">
                    <button style="width: 200px; background: black; color: white; opacity: 0.8;"  class="btn btn-dark dropdown-toggle"
                            type="button"
                            id="multiSelectDropdown"
                            data-bs-toggle="dropdown"
                            aria-expanded="false">
                        Tag
                    </button>
                    <ul class="dropdown-menu"
                        aria-labelledby="multiSelectDropdown">
                        @foreach ($posts as $post)
                        @php
                            $tags = explode(',', $post->tag); // Split tags into an array
                        @endphp
                        @foreach ($tags as $tag)
                            <li>
                                <label>
                                    <input wire:model.debounce.400ms="tag" style="margin-left: 10px" type="checkbox"
                                           value="{{ trim($tag) }}"> <!-- Trim to remove any extra spaces -->
                                    {{ trim($tag) }}
                                </label>
                            </li>
                        @endforeach
                    @endforeach

                    </ul>
                </div>

            </div>
            </div>
            <form style="display: flex; justify-content: center; margin-top: 15px" wire:submit.prevent="resetfilter">
                <button id="clearSelections" style="text-decoration: underline; padding-left: 100px" class="btn btn-none">Clear all</button>
            </form>
          <section class="product_section layout_padding">
              <div class="container">
                 <div class="heading_container heading_center">
                    <h2>
                       All <span>Blogs</span>
                    </h2>
                 </div>
                 <div class="row">
                  @foreach ($posts as $post)
                    <div class="col-sm-6 col-md-4 col-lg-4">
                       <div class="box">
                          <div class="option_container">
                             <div style="font-family: bold;" class="options">
                                <a href="{{ url('post_details',$post->id) }}" class="option1">
                                    Product Details
                                </a>
                                  <div class="row" style="margin-top: 40px;">
                                      <div style="height: 100px; width:300px" class="col-md-4">
                                        <p style=" font-family: bold; font-size: 18px; text-justify: center; ">{{Str::limit( $post->content,35, '...') }} </p>
                                      </div>

                                  </div>
                             </div>
                          </div>
                          <div class="img-box">
                             <img src="thumbnail/{{ $post->thumbnail }}" alt="">
                          </div>
                          <div class="detail-box">
                             <h5>
                                By: {{ $post->title }}
                             </h5>
                                  <h6 style="color:rgb(223, 76, 98)"> {{ $post->category }}</h6>
                          </div>
                          <div class="row">
                                @php
                                $tags = explode(',', $post->tag); // Split tags into an array
                                @endphp
                                @foreach ($tags as $tag)
                                    <h6 style="background: black; color: white; padding-left: 10px; padding-bottom: 5px; padding-top: 5px; border-radius: 10px; height:30px; width: 70px">
                                        {{ trim($tag) }}
                                    </h6>
                                @endforeach
                                </div>
                        </div>
                    </div>
                    @endforeach
                 </div>
              </div>
           </section>
           <div style="margin-bottom: 40px; margin-left: 40px; margin-right: 40px; text-align: center; height:130px; overflow: hidden;">
            {{ $posts->links()}}
        </div>
</div>
