<?php
	/*
    $arc = 	"https://metron.cloud/api/arc/?format=json"
    character	"https://metron.cloud/api/character/?format=json"
    creator	"https://metron.cloud/api/creator/?format=json"
    credit	"https://metron.cloud/api/credit/?format=json"
    issue	"https://metron.cloud/api/issue/?format=json"
    publisher	"https://metron.cloud/api/publisher/?format=json"
    role	"https://metron.cloud/api/role/?format=json"
    series	"https://metron.cloud/api/series/?format=json"
    series_type	"https://metron.cloud/api/series_type/?format=json"
    team	"https://metron.cloud/api/team/?format=json"
    variant	"https://metron.cloud/api/variant/?format=json"
*/

//Example endpoints:

$a = 'https://metron.cloud/api/arc/?format=json&offset=0&limit=100';

// alternative to offset/limit with 100 items per page::
$cc = 'https://metron.cloud/api/character/?format=json&page=173';
// BEN reilly 
$b = 'https://metron.cloud/api/character/2360/?format=json';
$b = 'https://metron.cloud/api/character/?format=json&offset=0&limit=1000';


// Spider-Man
$b = 'https://metron.cloud/api/character/145/?format=json';




/*

    api
GET
/api/arc/
GET
/api/arc/{id}/
GET
/api/arc/{id}/issue_list/
GET
/api/character/
GET
/api/character/{id}/
GET
/api/character/{id}/issue_list/
GET
/api/creator/
GET
/api/creator/{id}/
GET
/api/issue/
GET
/api/issue/{id}/
GET
/api/publisher/
GET
/api/publisher/{id}/
GET
/api/publisher/{id}/series_list/
GET
/api/role/
GET
/api/schema/
GET
/api/series/
GET
/api/series/{id}/
GET
/api/series/{id}/issue_list/
GET
/api/series_type/
GET
/api/team/
GET
/api/team/{id}/
GET
/api/team/{id}/issue_list/
Schemas
Arc
ArcList
AssociatedSeries
CharacterList
CharacterRead
Creator
CreatorList
CreditRead
Genre
IssueList
IssueListSeries
IssuePublisher
IssueRead
IssueSeries
PaginatedArcListList
PaginatedCharacterListList
PaginatedCreatorListList
PaginatedIssueListList
PaginatedPublisherListList
PaginatedRoleList
PaginatedSeriesListList
PaginatedSeriesTypeList
PaginatedTeamListList
Publisher
PublisherList
Rating
Reprint
Role
SeriesList
SeriesRead
SeriesType
TeamList
TeamRead
VariantsIssue

*/