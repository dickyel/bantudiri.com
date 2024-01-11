@extends('layouts.menu')

@section('title', 'tes prokraktinasi akademik')

@section('content')
   <section class="section-content h-100 w-100" data-aos="fade-up" data-aos-duration="1300">
      <div class="content container-xl mx-auto position-relative">
         <form id="questionnaireForm" action="{{ route('user.submit-responses') }}" method="post" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="responses" id="responses" value="">
            <div class="section-question">
               <div id="questions-container" class="row">
                  <!-- Initial load: Display the first 6 questions -->
                  @foreach($questions->take(6) as $question)
                     <div class="question col-md-10 mb-4" data-question-id="{{ $question->id }}">
                        <label for="" class="form-label" style="color: #053A3E; font-size:18px;">
                           {{ $question->question }}
                        </label>
                        <div class="response-container">
                           @if($question->pos_neg == 'positif')
                              <div>
                                 <input type="radio" name="responses[{{ $question->id }}]" value="1" onclick="updateResponses(this)">Sangat Tidak Setuju
                              </div>
                              <div>
                                 <input type="radio" name="responses[{{ $question->id }}]" value="2" onclick="updateResponses(this)">Tidak Setuju
                              </div>
                              <div>
                                 <input type="radio" name="responses[{{ $question->id }}]" value="3" onclick="updateResponses(this)">Kurang Setuju
                              </div>
                              <div>
                                 <input type="radio" name="responses[{{ $question->id }}]" value="4" onclick="updateResponses(this)">Setuju
                              </div>
                              <div>
                                 <input type="radio" name="responses[{{ $question->id }}]" value="5" onclick="updateResponses(this)">Sangat Setuju
                              </div>
                           @elseif($question->pos_neg == 'negatif')
                              <div>
                                 <input type="radio" name="responses[{{ $question->id }}]" value="5" onclick="updateResponses(this)">Sangat Tidak Setuju
                              </div>
                              <div>
                                 <input type="radio" name="responses[{{ $question->id }}]" value="4" onclick="updateResponses(this)">Tidak Setuju
                              </div>
                              <div>
                                 <input type="radio" name="responses[{{ $question->id }}]" value="3" onclick="updateResponses(this)">Kurang Setuju
                              </div>
                              <div>
                                 <input type="radio" name="responses[{{ $question->id }}]" value="2" onclick="updateResponses(this)">Setuju
                              </div>
                             
                              <div>
                                 <input type="radio" name="responses[{{ $question->id }}]" value="1" onclick="updateResponses(this)">Sangat Setuju
                              </div>
                           @endif
                        </div>
                     </div>
                  @endforeach
               </div>
               <div class="d-flex justify-content-center">
                  <!-- Load More Button -->
                  <button type="button" class="btn btn-start mt-4" id="loadMoreBtn" onclick="loadMore()">Load More</button>
                  <!-- Submit Button -->
                  <button type="button" class="btn btn-start mt-4" id="submitBtn" style="display: none;" onclick="submitForm()">Submit selesai</button>
               </div>
            </div>
         </form>
      </div>
   </section>

   @push('after-scripts')
      <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
      <script>
         // Clear previously selected responses from localStorage on page load
         localStorage.removeItem('selectedResponses');
         var currentQuestion = 6; // Start from the 7th question
         var totalQuestions = {{ $questions->count() }};
         var selectedResponses = JSON.parse(localStorage.getItem('selectedResponses')) || {};

         function updateResponses(input) {
            selectedResponses[input.name] = input.value;
            saveResponsesToLocalStorage();
         }

         function updateAllResponses() {
            var radioButtons = document.querySelectorAll('input[type="radio"]');
            radioButtons.forEach(function (radio) {
               if (radio.checked) {
                  selectedResponses[radio.name] = radio.value;
               }
            });
            saveResponsesToLocalStorage();
         }

         function saveResponsesToLocalStorage() {
            localStorage.setItem('selectedResponses', JSON.stringify(selectedResponses));
         }

         function loadMore() {
            // Load the next set of questions
            var end = Math.min(currentQuestion + 6, totalQuestions);
            var questions = @json($questions->toArray()).slice(currentQuestion, end);

            // Append the new questions to the container
            var questionsContainer = document.getElementById('questions-container');
            questions.forEach(function (question) {
               var questionDiv = document.createElement('div');
               questionDiv.className = 'question col-md-10 mb-4';  // Ensure the width is set to col-md-10
               questionDiv.dataset.questionId = question.id;
               questionDiv.innerHTML = '<label for="" class="form-label" style="color: #053A3E; font-size:18px;">' + question.question + '</label>' +
                     '<div class="response-container">' +
                     (question.pos_neg === 'positif'
                        ? '<div>' +
                           '<input type="radio" name="responses[' + question.id + ']" value="1" onclick="updateResponses(this)">Sangat Tidak Setuju' +
                           '</div>' +
                           '<div>' +
                           '<input type="radio" name="responses[' + question.id + ']" value="2" onclick="updateResponses(this)">Tidak Setuju' +
                           '</div>' +
                           '<div>' +
                           '<input type="radio" name="responses[' + question.id + ']" value="3" onclick="updateResponses(this)">Kurang Setuju' +
                           '</div>' +
                           '<div>' +
                           '<input type="radio" name="responses[' + question.id + ']" value="4" onclick="updateResponses(this)">Setuju' +
                           '</div>' +
                           '<div>' +
                           '<input type="radio" name="responses[' + question.id + ']" value="5" onclick="updateResponses(this)">Sangat Setuju' +
                           '</div>'
                        : '<div>' +
                           '<input type="radio" name="responses[' + question.id + ']" value="5" onclick="updateResponses(this)">Sangat Tidak Setuju' +
                           '</div>' +
                           '<div>' +
                           '<input type="radio" name="responses[' + question.id + ']" value="4" onclick="updateResponses(this)">Tidak Setuju' +
                           '</div>' +
                           '<div>' +
                           '<input type="radio" name="responses[' + question.id + ']" value="3" onclick="updateResponses(this)">Kurang Setuju' +
                           '</div>' +
                           '<div>' +
                           '<input type="radio" name="responses[' + question.id + ']" value="2" onclick="updateResponses(this)">Setuju' +
                           '</div>' +
                           '<div>' +
                           '<input type="radio" name="responses[' + question.id + ']" value="1" onclick="updateResponses(this)">Sangat Setuju' +
                           '</div>'
                     ) +
                     '</div>';

               questionsContainer.appendChild(questionDiv);

               if (selectedResponses['responses[' + question.id + ']']) {
                     var selectedInput = questionDiv.querySelector('input[value="' + selectedResponses['responses[' + question.id + ']'] + '"]');
                     if (selectedInput) {
                        selectedInput.checked = true;
                     }
               }
            });

            currentQuestion += 6;
            updateQuestions();
         }



         function updateQuestions() {
            // Update button visibility based on the current question index
            if (currentQuestion >= totalQuestions) {
               document.getElementById('loadMoreBtn').style.display = 'none';
               document.getElementById('submitBtn').style.display = 'block';
            } else {
               document.getElementById('loadMoreBtn').style.display = 'block';
               document.getElementById('submitBtn').style.display = 'none';
            }

            saveResponsesToLocalStorage();
         }

         function submitForm() {
            // Check if all questions are answered
            var radioButtons = document.querySelectorAll('input[type="radio"]');
            var isAnyQuestionUnanswered = false;

            radioButtons.forEach(function (radio) {
               // Check if any radio button in a group is checked
               if (!document.querySelector('input[name="' + radio.name + '"]:checked')) {
                     isAnyQuestionUnanswered = true;
               }
            });

            if (isAnyQuestionUnanswered) {
               alert('Tolong jawab semua pertanyaan sebelum submit.');
               return;
            }

            // Set the responses value before submitting the form
            document.getElementById('responses').value = JSON.stringify(selectedResponses);
            document.getElementById('questionnaireForm').submit();
         }



         updateQuestions();
      </script>
   @endpush
   </section>
@endsection
