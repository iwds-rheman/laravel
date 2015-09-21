/* jQuery livequery Version: 1.1.1 */
(function(e){e.extend(e.fn,{livequery:function(t,n,r){var i=this,s;if(e.isFunction(t))r=n,n=t,t=undefined;e.each(e.livequery.queries,function(e,o){if(i.selector==o.selector&&i.context==o.context&&t==o.type&&(!n||n.$lqguid==o.fn.$lqguid)&&(!r||r.$lqguid==o.fn2.$lqguid))return(s=o)&&false});s=s||new e.livequery(this.selector,this.context,t,n,r);s.stopped=false;s.run();return this},expire:function(t,n,r){var i=this;if(e.isFunction(t))r=n,n=t,t=undefined;e.each(e.livequery.queries,function(s,o){if(i.selector==o.selector&&i.context==o.context&&(!t||t==o.type)&&(!n||n.$lqguid==o.fn.$lqguid)&&(!r||r.$lqguid==o.fn2.$lqguid)&&!this.stopped)e.livequery.stop(o.id)});return this}});e.livequery=function(t,n,r,i,s){this.selector=t;this.context=n;this.type=r;this.fn=i;this.fn2=s;this.elements=[];this.stopped=false;this.id=e.livequery.queries.push(this)-1;i.$lqguid=i.$lqguid||e.livequery.guid++;if(s)s.$lqguid=s.$lqguid||e.livequery.guid++;return this};e.livequery.prototype={stop:function(){var e=this;if(this.type)this.elements.unbind(this.type,this.fn);else if(this.fn2)this.elements.each(function(t,n){e.fn2.apply(n)});this.elements=[];this.stopped=true},run:function(){if(this.stopped)return;var t=this;var n=this.elements,r=e(this.selector,this.context),i=r.not(n);this.elements=r;if(this.type){i.bind(this.type,this.fn);if(n.length>0)e.each(n,function(n,i){if(e.inArray(i,r)<0)e.event.remove(i,t.type,t.fn)})}else{i.each(function(){t.fn.apply(this)});if(this.fn2&&n.length>0)e.each(n,function(n,i){if(e.inArray(i,r)<0)t.fn2.apply(i)})}}};e.extend(e.livequery,{guid:0,queries:[],queue:[],running:false,timeout:null,checkQueue:function(){if(e.livequery.running&&e.livequery.queue.length){var t=e.livequery.queue.length;while(t--)e.livequery.queries[e.livequery.queue.shift()].run()}},pause:function(){e.livequery.running=false},play:function(){e.livequery.running=true;e.livequery.run()},registerPlugin:function(){e.each(arguments,function(t,n){if(!e.fn[n])return;var r=e.fn[n];e.fn[n]=function(){var t=r.apply(this,arguments);e.livequery.run();return t}})},run:function(t){if(t!=undefined){if(e.inArray(t,e.livequery.queue)<0)e.livequery.queue.push(t)}else e.each(e.livequery.queries,function(t){if(e.inArray(t,e.livequery.queue)<0)e.livequery.queue.push(t)});if(e.livequery.timeout)clearTimeout(e.livequery.timeout);e.livequery.timeout=setTimeout(e.livequery.checkQueue,20)},stop:function(t){if(t!=undefined)e.livequery.queries[t].stop();else e.each(e.livequery.queries,function(t){e.livequery.queries[t].stop()})}});e.livequery.registerPlugin("append","prepend","after","before","wrap","attr","removeAttr","addClass","removeClass","toggleClass","empty","remove","html");e(function(){e.livequery.play()})})(jQuery);

(function($) {
	var utils= {
		init: function() {
			this.route.init();
		},
		route: {
			init: function(){
				utils.route.project.init();
			},
			project:{
				init: function(){
					utils.route.project.Intellisense();
					utils.route.project.tasklist();
				},
				Intellisense: function(){
					
					$('.task-box-form input[name="taskname"]').mention({
						delimiter: '@',
						emptyQuery: true,
						users: [{
						username: "Rheman",
						image: 'dashboard/img/a3.jpg'
						}, {
						username: "Marven",
						image: 'dashboard/img/a5.jpg'
						}, {
						username: "Kirk",
						image: 'dashboard/img/a4.jpg'
						}]
					});
					
					$('.task-box-form').livequery('submit',function(e){
						
						var x = 1;
						var todo = [] , comment = [];
						var  inputSplit = $('.task-box-form input[name="taskname"]').val().split('@');
						console.log(inputSplit[0]+'asdasdasd');
						console.log('User:');
						while(inputSplit.length > x){
							console.log(inputSplit[x]);
							x++;
						}
						x=1;
						if($('.task-box-form textarea').val().trim().charAt(0)=='#'){
						var  areaSplit =  $('.task-box-form textarea').val().split('#');
							while(areaSplit.length > x){
								
								var todoFilter = areaSplit[x].split('::');
								
								if(todoFilter.length > 1){
									todo[x]=todoFilter[0];
									comment[x]=todoFilter[1];
									
								}else{
									todo[x]=todoFilter[0];
								}
								
								console.log('todo: '+todo[x]);
								console.log('comment: '+comment[x]);
								x++;
							 } 
						}else if($('.task-box-form textarea').val().trim().charAt(0)==':'){
							var y=1;
							var  areaSplit =  $('.task-box-form textarea').val().split('::');
							while(areaSplit.length > x){
								
								var todoFilter = areaSplit[x].split('#');
									while(todoFilter.length>y){
										if(todoFilter.length > 1){
											todo[x]=todoFilter[1];
											comment[x]=todoFilter[0];
											
										}else{
											todo[x]=todoFilter[1];
										}
										console.log('todo: '+todo[y]);
											y++;
										
									}
									console.log('comment: '+comment[x]);
								x++;
							 } 
						}
						
						e.preventDefault();
					});
					
				},
				tasklist: function(){
					var request = new JSONP();
					var _tasklist=$('.project-task-list table tbody');
					
					
					$('.project-list .project-title a').livequery('click',function(e){
						//show the task form
						$('.task-box').show();
						//animate active
						$('.project-list .project-title').removeClass('project-open');
						$(this).parent().addClass('project-open');
						//ajax get request
						_tasklist.find('tr').remove();
						request.set_data('GET','/project/task', {ProjID:$(this).attr('data')});
						request.result().complete(function(data) {
							$.each(data.responseJSON, function(k, v) {
								var state='';
								if(v.PriorityLvl==1){
									state='<div class="Urgent"></div> <div class="'+v.Status+' height-half"></div>';
								}else{
									 state='<div class="'+v.Status+'"></div>';
								}
								_tasklist.append(
									'<tr><td class="issue-info">'+
										'<div class="state">'+state+'</div>'+
										'<div class="task">'+
											'<a href="#" data="'+v.UID+'" class="trigger-taskbox">'+
											'<small>'+v.TaskName+'</small>'+
											'</a><br>'+
											'<small>'+v.TaskDesc+'</small>'+
										'</div>'+
										'</td>'+
									'</tr>' 
								);
							
							});
						});
						e.preventDefault();
					});
					
				}
				
			}

		},
		helper:{
			
		}
	}
	
	var JSONP = (function() {
	var cache = {}, request = {},
			_const = function() {
				this.set_data = function(type,url, v) {
					request = $.ajax({
						type: type,
						async: true,
						dataType: "json",
						url: url,
						data: v,
						contentType: "application/json; charset=utf-8",
						error: function (xhr, ajaxOptions, thrownError) {
							console.log(xhr.status + " " + thrownError + ". Please contact the site administrator.");
						}
					});
				};
			};
						
		_const.prototype = {
			result: function() { return request; }
		};		
		
		return _const;
	})();

	$(document).ready(function() { utils.init(); });
})(jQuery);

