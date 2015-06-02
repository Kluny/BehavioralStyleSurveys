# BehavioralStylesSurvey

This CakePHP plugin was created for a client that specializes in career coaching. They have this survey where they ask 20 questions and put together a "personality type" for the survey. It's loosely based on the Myers-Briggs test. 

The trouble is, this client's site had been worked on over the course of many years by several different developers, with varying standards of code quality and syntax. The underlying logic was messy and difficult for newcomer to understand. This is no one's fault, simply the result of 10 years of legacy code based on fuzzy requirements that grew clearer as years went by.

However, the client in question had lots of changes they wanted to make. The meat of the survey was fine (the questions and results, that is), but they wanted a different URL to send to Australian customers, or a different admin recipient depending on who was taking the survey, things like that. Minor changes that should have been easy and painless, but because of the state of the codebase, would end up taking hours.

So finally the client agreed to an overhaul of their entire site. This is one of several plugins that are being reviewed for code quality, and the quickest and easiest to fix, so it came first. 
___

##Models
Models are wrappers for database tables, and can have their own logic as well. Conventionally, any data processing-heavy tasks should be carried out here.

###Survey 
- Fields
 - name of survey
 - url slug
 - admin recipient

###Survey Submission
- Fields
  - name of user
  - contact info (users are not required to sign in for this survey, so user contact data is not normalized to a separate Users table in this case)
  - response data
  - link to generated personality graph
  - link to pdf with more info
  - date created/modified
- Additional logic
  - processes user submitted data
  - saves it after processing
  - generates a personality graph

##Controllers

Controllers simply request information from the model and relay it to the appropriate view.

####SurveySubmissions Controller
- grabs survey-specific data from database and relays it to the view
- sends result data to admin recipient and survey
- calls data processing function

####Survey Controller 
- nothing interesting

##Views
View display data and receive user input.

####Survey
- view - displays the questions and user input form.
- index - lists all available surveys
- admin_index - as above
- admin_edit - create new surveys as needed

####SurveySubmission
- admin_index - list of all user submissions
- admin_view - view of a single user's data

####Emails 	
- beautifully formatted result to be delivered to surveyee (plus a text-only version)

---

I've made all this as simple and conventional as I could. It's not a complicated application and doesn't require any new wheels to be invented. All logic is stored in models, all display stuff is in views. Controllers act as a go-between and nothing more. 

This is in contrast to the previous state, where both the data processing (generating the graphs, doing math on the results, saving to database) and display code (yes, the actual HTML) were located in a single, astonishing controller function. 

The finished result is clearer, more maintainable, more performant, and more flexible, and will deliver lasting value to the client while reducing the developer's workload.

		









