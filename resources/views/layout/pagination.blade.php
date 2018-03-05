		<section style="margin-bottom: 10px;">
			<div class="container">
				<div class="row">
					<div class="col-md-12">						
						<nav aria-label="Page navigation" style="float: right;">
							<ul class="pagination">

								@if($paginator->previous_page > 1)
									<li class="page-item"><a class="page-link" href="{{ URL::to('koprasi/'.$user_data['shop']->url.'?page='.$paginator->last_page) }}">First</a></li>
								@endIf
								
								@if($paginator->current_page !== $paginator->previous_page)
									<li class="page-item"><a class="page-link" href="{{ URL::to('koprasi/'.$user_data['shop']->url.'?page='.$paginator->previous_page) }}">{{ $paginator->previous_page }}</a></li>
								@endIf

								<li class="page-item active">
							    	<a class="page-link disabled" href="#">{{ $paginator->current_page }} <span class="sr-only">(current)</span></a>
							    </li>
								
								@if($paginator->current_page !== $paginator->next_page)
									<li class="page-item"><a class="page-link" href="{{ URL::to('koprasi/'.$user_data['shop']->url.'?page='.$paginator->next_page) }}">{{ $paginator->next_page }}</a></li>
								@endIf
								
								@if($paginator->current_page !== $paginator->last_page AND $paginator->next_page !== $paginator->last_page)
									<li class="page-item"><a class="page-link" href="{{ URL::to('koprasi/'.$user_data['shop']->url.'?page='.$paginator->last_page) }}">Last</a></li>
								@endIf
							</ul>
						</nav>					
					</div><!-- /.col-md-12 -->
				</div><!-- /.row -->
			</div>
		</section>